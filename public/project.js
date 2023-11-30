fetch('/get_data')
    .then(response => response.json())
    .then(data => {
        console.log(data);
        
        const selectInstitution = document.getElementById('institution');
        const selectDepartment = document.getElementById('department');
        const selectElement = document.getElementById('data_select');

        data.forEach(item => { 
            const institution = item.institution;

            const option_institution = document.createElement('option');
            option_institution.value = institution;
            option_institution.textContent = institution;
            selectInstitution.appendChild(option_institution);
        })

        function select_dept(){
            selectDepartment.innerHTML = '';
            var index = selectInstitution.value;
            const selected = data.filter(item => item.institution === index);

            selected.forEach(item => {
                const department = item.department;
                const option_department = document.createElement('option');
                option_department.value = department;
                option_department.textContent = department;
                selectDepartment.appendChild(option_department);
            });
            if(index === "中正大學"){
                selectDepartment.style.display = "none";
            }else{
                selectDepartment.style.display = "inline-block";
            }

        }

        selectInstitution.addEventListener('change', function() {
            select_dept();
            select_project();
        });

        function select_project(){
            selectElement.innerHTML = '';
            var institution = selectInstitution.value;
            var department = selectDepartment.value;
            const selected = data.filter(item => (item.institution === institution) && (item.department == department));
            selected.forEach(item => {
                const option = document.createElement('option');
                const id =item.id;
                const name = item.name;
                option.value = id;
                option.textContent = name;
                selectElement.appendChild(option);
            });
            document.getElementById('donation_project_name').value = selectElement.value;
            selectElement.style.display = "inline-block";
        }
        
        selectDepartment.addEventListener('change', function() {
            select_project();
        });

        document.addEventListener('DOMContentLoaded', function() {
            select_dept();
            select_project();
        });
    });
