fetch('/get_data')
    .then(response => response.json())
    .then(data => {
        console.log(data);
        
        const selectInstitution = document.getElementById('institution');
        const selectDepartment = document.getElementById('department');
        const selectElement = document.getElementById('data_select');
        data.forEach(item => { 
            const id = item.id;
            const name = item.name;
            const institution = item.institution;
            const department = item.department;

            const option_institution = document.createElement('option');
            option_institution.value = institution;
            option_institution.textContent = institution;
            selectInstitution.appendChild(option_institution);

            const option_department = document.createElement('option');
            option_department.value = department;
            option_department.textContent = department;
            selectDepartment.appendChild(option_department);

            const option = document.createElement('option');
            option.value = id;
            option.textContent = name;
            selectElement.appendChild(option);
        })
    });
