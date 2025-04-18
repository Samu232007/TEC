const terminalOutput = document.getElementById('terminal-output');
const commandInput = document.getElementById('command-input');

let commandHistory = []; // Historial de comandos
let historyIndex = -1; // Índice del historial

commandInput.addEventListener('keydown', async (event) => {
    if (event.key === 'Enter') {
        const command = commandInput.value.trim();
        if (command === '') return;

        // Agregar el comando al historial
        commandHistory.push(command);
        historyIndex = commandHistory.length; // Restablecer el índice
        if (commandHistory.length > 50) {
            commandHistory.shift(); // Elimina el comando más antiguo
        }

        // Mostrar el comando en la terminal
        appendToTerminal(`base_datos_TEC=# ${command}`);

        // Enviar el comando al servidor
        try {
            const response = await fetch('execute_sql.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ command })
            });

            const result = await response.json();

            if (result.error) {
                appendToTerminal(`Error: ${result.error}`);
            } else if (result.data) {
                appendToTerminal(result.data);
            } else if (result.message) {
                appendToTerminal(result.message);
            }
        } catch (error) {
            appendToTerminal(`Error de conexión: ${error.message}`);
        }

        // Limpiar el input
        commandInput.value = '';
    } else if (event.key === 'ArrowUp') {
        // Navegar hacia atrás en el historial
        if (historyIndex > 0) {
            historyIndex--;
            commandInput.value = commandHistory[historyIndex];
        } else if (historyIndex === 0) {
            commandInput.value = commandHistory[historyIndex];
        }
    } else if (event.key === 'ArrowDown') {
        // Navegar hacia adelante en el historial
        if (historyIndex < commandHistory.length - 1) {
            historyIndex++;
            commandInput.value = commandHistory[historyIndex];
        } else if (historyIndex === commandHistory.length - 1) {
            historyIndex++;
            commandInput.value = ''; // Limpiar si se pasa del último comando
        }
    }
});

function appendToTerminal(content) {
    const line = document.createElement('div');
    line.textContent = content;
    terminalOutput.appendChild(line);
    terminalOutput.scrollTop = terminalOutput.scrollHeight; // Scroll automático
}