// Génère un fichier DBML (dbdiagram.io) à partir de la base MySQL.
// Usage : npm run db:diagram [-- <nom_de_la_base>]
// La connexion se lit dans DBML_DATABASE_URL (.env.local), ex :
//   DBML_DATABASE_URL="mysql://root:root_password@127.0.0.1:3306/horologia"
import { execFileSync } from 'node:child_process';
import { existsSync, mkdirSync } from 'node:fs';

if (existsSync('.env.local')) process.loadEnvFile('.env.local');

const url = new URL(process.env.DBML_DATABASE_URL ?? '');
if (process.argv[2]) url.pathname = `/${process.argv[2]}`;
const dbName = decodeURIComponent(url.pathname.slice(1));
if (!dbName) throw new Error('Aucune base indiquée (DBML_DATABASE_URL ou argument).');

mkdirSync('database', { recursive: true });
const out = `database/${dbName}.dbml`;
execFileSync('npx', ['db2dbml', 'mysql', url.toString(), '-o', out], { stdio: 'inherit' });
console.log(`\n→ ${out} : copie son contenu dans https://dbdiagram.io/d pour voir le schéma.`);
