# 🔧 Fix: Erro Rolldown no Windows (CPU antiga)

## ❌ Problema
Erro:
- `Cannot find native binding`
- `DLL initialization routine failed (rolldown)`

Causa:
- Rolldown não é compatível com CPUs antigas (ex: Pentium E2220)

---

## ✅ Solução estável (RECOMENDADA)

### 1. Remover dependências atuais
```
bash
rmdir /s /q node_modules
del package-lock.json
```


## 2. Remover Vite atual (8 + Rolldown)
```
npm uninstall vite laravel-vite-plugin
```
## 3. Instalar versões estáveis (SEM Rolldown)
```
npm install -D vite@5 laravel-vite-plugin@1.0.0
```
## 4. Instalar dependências novamente
```
npm install
```
## 5. Rodar o projeto
```
npm run dev
```
