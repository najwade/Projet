document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('input[type="number"]').forEach(function(input) {
        input.addEventListener('change', function() {
            const professorId = input.parentElement.parentElement.querySelector('td:first-child').getAttribute('data-professor-id');
            const moduleName = input.parentElement.parentElement.parentElement.querySelector('th').textContent.trim();
            const moduleType = input.parentElement.previousElementSibling.classList.contains('module-title') ? input.parentElement.previousElementSibling.textContent.trim() : '';
            const nbrGroups = input.value;
            updateNbrGroups(professorId, moduleName, moduleType, nbrGroups);
            
        });
    });

    function updateNbrGroups(professorId, moduleName, moduleType, nbrGroups) {
        // Send AJAX request to PHP script
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_nbrgroups.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log('Nbrgroups updated successfully.');
                console.log(xhr.responseText);
            } else {
                console.error('Error updating nbrgroups.');
            }
        };
        xhr.onerror = function() {
            console.error('Error updating nbrgroups.');
        };
        const params = 'professor_id=' + encodeURIComponent(professorId) + '&module_name=' + encodeURIComponent(moduleName) + '&module_type=' + encodeURIComponent(moduleType) + '&nbr_groups=' + encodeURIComponent(nbrGroups);
        xhr.send(params);
    }
});
