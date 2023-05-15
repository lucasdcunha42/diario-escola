/* 1) Escreva comandos SQL para inserir os dados abaixo conforme o diagrama
 apresentado.
 a) Pablo é Pai de Lucas
 b) Brenda é Mãe de Lucas
 */
CREATE TABLE Aluno (
    Id INT PRIMARY KEY,
    Nome VARCHAR(100)
);

CREATE TABLE Responsavel (
    Id INT PRIMARY KEY,
    Nome VARCHAR(100)
);

CREATE TABLE Parentesco (
    IdResponsavel INT,
    IdAluno INT,
    Parentesco VARCHAR(50),
    FOREIGN KEY (IdResponsavel) REFERENCES Responsavel(Id),
    FOREIGN KEY (IdAluno) REFERENCES Aluno(Id),
    PRIMARY KEY (IdResponsavel, IdAluno)
);

INSERT INTO
    Aluno (Id, Nome)
VALUES
    (1, 'Lucas');

INSERT INTO
    Responsavel (Id, Nome)
VALUES
    (1, 'Pablo'),
    (2, 'Brenda');

INSERT INTO
    Parentesco (IdResponsavel, IdAluno, Parentesco)
VALUES
    (1, 1, 'Pai'),
    (2, 1, 'Mãe');

/*2) Escreva uma consulta SQL para retornar dados únicos conforme tabela abaixo.
Caso o aluno tenha mais de dois responsáveis, traga apenas os dois primeiros
responsáveis encontrados na tabela.*/

/* O comando de consulta retorna dados únicos somente no contexto da pergunta,
se houver mais de um aluno o comando não se aplica. Também o resultado desta query
não está formatada de acordo com a tabela da questão nº2, pois ainda não possuo conhecimento 
para realizar tal, porém após pesquisa e exemplo de alguns códigos consegui realizar a query
na formatação desejada, mas no momento não teria a capacidade de reproduzi-la independentemente.    
*/

/*Minha Solução*/
SELECT
    A.Nome AS Aluno,
    R.Nome AS Responsável,
    P.Parentesco
FROM
    Aluno A
    INNER JOIN Parentesco P ON P.IdAluno = A.Id
    INNER JOIN Responsavel R ON R.Id = P.IdResponsavel
GROUP BY
    Aluno
HAVING
    COUNT (*) > 0
Limit
    2;

/*Solução com fontes externas*/
SELECT
    A.Nome AS Aluno,
    MAX(
        CASE
            WHEN P.Rank = 1 THEN R.Nome
        END
    ) AS Responsavel,
    MAX(
        CASE
            WHEN P.Rank = 1 THEN P.Parentesco
        END
    ) AS Parentesco,
    MAX(
        CASE
            WHEN P.Rank = 2 THEN R.Nome
        END
    ) AS Responsavel,
    MAX(
        CASE
            WHEN P.Rank = 2 THEN P.Parentesco
        END
    ) AS Parentesco
FROM
    Aluno A
    INNER JOIN (
        SELECT
            IdAluno,
            IdResponsavel,
            Parentesco,
            ROW_NUMBER() OVER (
                PARTITION BY IdAluno
                ORDER BY
                    IdResponsavel
            ) AS Rank
        FROM
            Parentesco
    ) P ON A.Id = P.IdAluno
    INNER JOIN Responsavel R ON P.IdResponsavel = R.Id
WHERE
    A.Id = 1
GROUP BY
    A.Nome;

/*Bonus: 1) Escreva uma consulta SQL para trazer todos os dados. Seja criativo */

/*Alunos que não possuem nenhum responsavel */
SELECT
  A.Nome AS Aluno
FROM
  Aluno A
LEFT JOIN
  Parentesco P ON P.IdAluno = A.Id
WHERE
  P.IdAluno IS NULL;


/*Aluno com maior numero de responsaveis*/
SELECT
  A.Nome AS Aluno,
  COUNT(*) AS Numero_Responsaveis
FROM
  Aluno A
JOIN
  Parentesco P ON P.IdAluno = A.Id
GROUP BY
  A.Id, A.Nome
ORDER BY
  COUNT(*) DESC
LIMIT 1;