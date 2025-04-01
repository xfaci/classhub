const express = require('express');
const app = express();

app.post('/login', (req, res) => {
    const { username, password, device } = req.body;
    // Vérifier les identifiants et appareil
    // Rediriger ou bloquer
});

app.listen(3000, () => console.log('Serveur démarré'));