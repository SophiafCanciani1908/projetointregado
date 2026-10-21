```mermaid
erDiagram

usuarios {
   int id PK
   string email
   string senha 
}

alunos {
    int id PK
    string nome
    string cpf
    string email
    string telefone
    string endereco
    string turma
    date data_nasc
    string ativo
}

agendamentos {
    int id PK
    string nome_aluna
    string personal
    date data_agendamento
    int aluno_id FK
}

alunos ||--o{ agendamentos : "realiza"