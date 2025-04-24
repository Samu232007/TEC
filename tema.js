// Obtener el checkbox y el cuerpo
const toggleModeCheckbox = document.getElementById('toggle-mode');
const body = document.body;

// Cargar el modo guardado en localStorage
const savedMode = localStorage.getItem('theme');
if (savedMode === 'dark') {
    body.classList.add('dark-mode');
    toggleModeCheckbox.checked = true;
}

// Alternar entre modos
toggleModeCheckbox.addEventListener('change', () => {
    if (toggleModeCheckbox.checked) {
        body.classList.add('dark-mode');
        localStorage.setItem('theme', 'dark');
    } else {
        body.classList.remove('dark-mode');
        localStorage.setItem('theme', 'light');
    }
});
