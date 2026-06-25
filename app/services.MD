# Lógica dos Service e Controllers

## Contactos

### Metódos
***

### Buscar todos
```
/*
*   O request é para busca de
*   contacto pelo nome
*/
all(Request $request): array
```

### Criar
```
store($data = []): void
$data = [
    'dado1':$contacto,
    'dado2':$conta
];

```
### Buscar 
```
get(int $id): Model
```
### Deletar

Uma conta não pode estar desvinculada a 
nenhum contacto mas ainda assim deve ser possivel eliminar 
contactos associados a uma conta.
```
delete(int $id): void
```
### Actualizar
Actualiza os dados e dá a possibilidade
de vincular a mais uma conta existente.
```
update(int $id): void
```

### Associar contacto a uma conta.
Antes do contacto ser criado ele deve ser obragatoriamente vinculado 
a uma conta, ou seja um contacto não deve ser gerado sem uma conta, mas
um contacto pode vir a ficar sem vinculo com nenhuma conta e posteriormete vir a ser
vinculado a uma ou eliminado definitivamente
```
joinConta($data = []): void

$data = [
    'dado1': contacto,
    'dado2': conta,
];
```

### Desassociar contacto a uma conta.
```
unJoinConta($data = []): void

$data = [
    'dado1': contacto,
    'dado2': conta,
];
```

### Associar contacto a uma conta.
```
joinConta($data = []): void

$data = [
    'dado1': contacto,
    'dado2': conta,
];
```


## Contas

### Metódos
***

### Buscar todas
```
/*
*   O request é para busca de
*   conta pelo nome do cliente
*/
all(Request $request): array
```
### Criar
```
store($data = []): void
$data = [
    'dado1':$contacto,
    'dado2':$conta
];
```
### Actualizar
```
update(int $id): void
```
### Deletar
```
delete(int $id): void
```
### Cancelar conta.
```
cancelConta(int $id): void
```
### Activar conta.
```
cancelConta(int $id): void
```


## Assinaturas

### Metódos
***

### Buscar todas
```
/*
*   O request é para busca de
*   assinaturas pelo nome do cliente
*/
all(Request $request): array
```

### Actualizar
```
update(int $id): void
```
### Deletar
```
delete(int $id): void
```

### Cancelar assinatura.
```
cancelAssign(int $id): void
```
### Reactivar assinatura.
```
activeAssign(int $id): void
```
