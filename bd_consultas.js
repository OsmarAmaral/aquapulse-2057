const http = require('http');
const mySQL = require('mysql2');

var database = 'AquaPulse';

const conexao = mySQL.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: database
});

conexao.connect(function (err) {
    if(err) {
        console.error('erro de conexão ao bd', err.stack);
        return;
    }else {
        console.log(`conexão bem sucedida ao bd : ${database}`);
    }
});

const servidor = http.createServer(function (req, res, userName) {
    res.writeHead(200, { 'Content-type': 'text/plain' });

    conexao.query("SELECT nome_usuario, id_usuario FROM tbUsuarios WHERE estado_usuario = 'Mato Grosso' and cidade_usuario = 'Rondonópolis' ", function (err, resultados) {
        if (err) {
            res.end('Erro ao buscar usuário: ' + err.message);
            return;
        }

        if (resultados.length > 0) {
            const userName = resultados.map(usuario => usuario.nome_usuario).join('\n');
            let mensagem = '';
            for (let i = 0; i < resultados.length; i++) {
                mensagem += `Hello, ${resultados[i].nome_usuario}\n`;
            }
            res.end(mensagem);
            } else {
                res.end('Usuário não encontrado.');
            }
    });
});

servidor.listen(3000, () => {
    console.log('http://localhost:3000/');
});
