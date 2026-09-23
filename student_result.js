function addStudent() {

    const rollNo = document.getElementById("rollNo").value.trim();
    const name = document.getElementById("name").value.trim();
    const mathematics = document.getElementById("mathematics").value;
    const physics = document.getElementById("physics").value;
    const programming = document.getElementById("programming").value;
    const electronics = document.getElementById("electronics").value;

    if (
        rollNo === "" ||
        name === "" ||
        mathematics === "" ||
        physics === "" ||
        programming === "" ||
        electronics === ""
    ) {
        document.getElementById("addResult").innerHTML = `
            <div class="error">
                Please fill in all fields.
            </div>
        `;
        return;
    }

    fetch("student_result.php", {
        method: "POST",
        body: new URLSearchParams({
            action: "add",
            rollNo: rollNo,
            name: name,
            mathematics: mathematics,
            physics: physics,
            programming: programming,
            electronics: electronics
        })
    })
        .then(response => response.json())
        .then(data => {

            if (data.success) {

                document.getElementById("addResult").innerHTML = `
                    <div class="success">
                        ${data.message}
                    </div>
                `;

                document.getElementById("rollNo").value = "";
                document.getElementById("name").value = "";
                document.getElementById("mathematics").value = "";
                document.getElementById("physics").value = "";
                document.getElementById("programming").value = "";
                document.getElementById("electronics").value = "";

            } else {

                document.getElementById("addResult").innerHTML = `
                    <div class="error">
                        ${data.message}
                    </div>
                `;
            }

        })
        .catch(error => {

            console.error(error);

            document.getElementById("addResult").innerHTML = `
                <div class="error">
                    Something went wrong while communicating
                    with the server.
                </div>
            `;

        });
}


function searchStudent() {

    const rollNo = document.getElementById("searchRollNo").value.trim();

    if (rollNo === "") {

        document.getElementById("searchResult").innerHTML = `
            <div class="error">
                Please enter a roll number.
            </div>
        `;

        return;
    }

    fetch("student_result.php", {
        method: "POST",
        body: new URLSearchParams({
            action: "search",
            rollNo: rollNo
        })
    })
        .then(response => response.json())
        .then(data => {

            if (!data.success) {

                document.getElementById("searchResult").innerHTML = `
                    <div class="error">
                        ${data.message}
                    </div>
                `;

                return;
            }

            const student = data.student;
            const marks = data.marks;

            let html = `

                <div class="result-card">

                    <h2>
                        Student Result
                    </h2>

                    <div class="student-info">

                        <p>
                            <strong>Name:</strong>
                            ${student.name}
                        </p>

                        <p>
                            <strong>Roll Number:</strong>
                            ${student.roll_no}
                        </p>

                    </div>

                    <table>

                        <tr>
                            <th>Subject</th>
                            <th>Marks</th>
                        </tr>

            `;

            for (const subject in marks) {

                html += `

                    <tr>

                        <td>
                            ${subject}
                        </td>

                        <td>
                            ${marks[subject]}
                        </td>

                    </tr>

                `;
            }

            html += `

                    </table>

                    <div class="summary">

                        <div class="summary-box">

                            <h3>
                                Total
                            </h3>

                            <p>
                                ${data.total}
                            </p>

                        </div>

                        <div class="summary-box">

                            <h3>
                                Average
                            </h3>

                            <p>
                                ${data.average}
                            </p>

                        </div>

                        <div class="summary-box">

                            <h3>
                                Grade
                            </h3>

                            <p>
                                ${data.grade}
                            </p>

                        </div>

                    </div>

                </div>

            `;

            document.getElementById("searchResult").innerHTML = html;

        })
        .catch(error => {

            console.error(error);

            document.getElementById("searchResult").innerHTML = `
                <div class="error">
                    Something went wrong while communicating
                    with the server.
                </div>
            `;

        });
}


function viewAllStudents() {

    fetch("student_result.php", {
        method: "POST",
        body: new URLSearchParams({
            action: "view_all"
        })
    })
        .then(response => response.json())
        .then(data => {

            if (!data.success) {

                document.getElementById("allStudentsResult").innerHTML = `
                    <div class="error">
                        ${data.message}
                    </div>
                `;

                return;
            }

            if (data.students.length === 0) {

                document.getElementById("allStudentsResult").innerHTML = `
                    <div class="error">
                        No students found.
                    </div>
                `;

                return;
            }

            let html = `

                <div class="table-container">

                    <table>

                        <tr>
                            <th>Roll No</th>
                            <th>Name</th>
                            <th>Mathematics</th>
                            <th>Physics</th>
                            <th>Programming</th>
                            <th>Electronics</th>
                            <th>Total</th>
                            <th>Average</th>
                            <th>Grade</th>
                        </tr>

            `;

            data.students.forEach(student => {

                html += `

                    <tr>

                        <td>
                            ${student.roll_no}
                        </td>

                        <td>
                            ${student.name}
                        </td>

                        <td>
                            ${student.marks.Mathematics}
                        </td>

                        <td>
                            ${student.marks.Physics}
                        </td>

                        <td>
                            ${student.marks.Programming}
                        </td>

                        <td>
                            ${student.marks.Electronics}
                        </td>

                        <td>
                            ${student.total}
                        </td>

                        <td>
                            ${student.average}
                        </td>

                        <td>
                            ${student.grade}
                        </td>

                    </tr>

                `;
            });

            html += `

                    </table>

                </div>

            `;

            document.getElementById("allStudentsResult").innerHTML = html;

        })
        .catch(error => {

            console.error(error);

            document.getElementById("allStudentsResult").innerHTML = `
                <div class="error">
                    Something went wrong while communicating
                    with the server.
                </div>
            `;

        });
}