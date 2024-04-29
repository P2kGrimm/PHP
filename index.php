<?php
function passouDeAno($pessoa) {
    $contagemNotasBaixas = 0;
    foreach ($pessoa['notas'] as $nota) {
        if ($nota < 6) {
            $contagemNotasBaixas++;
        }
    }
    return $contagemNotasBaixas >= 3 ? "Não passou de ano!" : "Passou de ano!";
}
function mediaIdade($pessoas) {
    $somaIdades = 0;
    foreach ($pessoas as $pessoa) {
        $somaIdades += $pessoa['idade'];
    }
    return $somaIdades / count($pessoas);
}
function pessoaMaisVelha($pessoas) {
    $maisVelha = null;
    $idadeMaxima = -1;
    foreach ($pessoas as $pessoa) {
        if ($pessoa['idade'] > $idadeMaxima) {
            $maisVelha = $pessoa;
            $idadeMaxima = $pessoa['idade'];
        }
    }
    return $maisVelha;
}
function senhaForte($senha) {
    return strlen($senha) >= 8 && preg_match('/[A-Z]/', $senha) && preg_match('/[a-z]/', $senha) && preg_match('/[0-9]/', $senha);
}function contaPostsPorAutor($posts) {
    $contagemAutores = [];
    foreach ($posts as $post) {
        $autor = $post['autor'];
        if (!isset($contagemAutores[$autor])) {
            $contagemAutores[$autor] = 0;
        }
        $contagemAutores[$autor]++;
    }
    return $contagemAutores;
}
$pessoa = [
    'nome' => 'João',
    'notas' => [
        'matematica' => 5,
        'portugues' => 6,
        'historia' => 7,
        'filosofia' => 10,
        'sociologia' => 9,
        'fisica' => 5,
        'quimica' => 1
    ]
];
$pessoas = [
    ['nome' => 'João', 'idade' => 20],
    ['nome' => 'Maria', 'idade' => 30],
    ['nome' => 'José', 'idade' => 40],
    ['nome' => 'Ana', 'idade' => 50],
];
$posts = [
    ['post' => 'Estou aprendendo PHP', 'autor' => 'João'],
    ['post' => 'Aprendi HTML, CSS e JavaScript', 'autor' => 'João'],
    ['post' => 'Estou trabalhando em um projeto', 'autor' => 'Maria'],
    ['post' => 'Estou estudando para o ENEM', 'autor' => 'José'],
    ['post' => 'Fiz um curso de PHP', 'autor' => 'Maria'],
    ['post' => 'Aprendi PHP', 'autor' => 'João'],
    ['post' => 'Estou trabalhando em um site', 'autor' => 'João'],
    ['post' => 'Terminei o curso de PHP', 'autor' => 'Maria']
];
$senha = 'SenhaForte123';
echo passouDeAno($pessoa);
echo "Média de idade: " . mediaIdade($pessoas);
echo "Pessoa mais velha: " . print_r(pessoaMaisVelha($pessoas), true);
echo "A senha é forte? " . (senhaForte($senha) ? 'Sim' : 'Não');
echo "Posts por autor: " . print_r(contaPostsPorAutor($posts), true);
?>
