### Sistema Saas erp para un gimnasio.

Integrantes: Ismael Sebastian Molina Paiva, nadie más.

# Funciones del sistema:

Estadísticas: Cantidad de miembros activos, cuotas por vencer, cantidad de nuevas

inscripciones por mes, gráfico de asistencias para ver horas pico.

Registros financieros: pagos, control de caja, gastos, reportes financieros.

Gestión de miembros: CRUD, cancelar membresía, ver propia información.

Planes mensuales, modificar el monto.

Empleados: crear roles y permisos personalizados.

# Stack Tecnológico:

Frontend: HTML, JavaScript y CSS (Tailwind).

Backend: PHP.

Base de Datos: SQL.

Guía de Estilo: camelCase, PascalCase.

Control de versiones: Git y GitHub.



























Mermaind
PK: Primary Key (Clave Primaria)
FK: Foreign Key (Clave Foránea)
int: numero entero
varchar: texto
date: fecha
decimal: numero con decimales
text: texto largo
bool: verdadero/falso



Estructura Front Controller

SaaSGYM/                  📂 Carpeta raíz de tu proyecto
├── public/                 ✅ Carpeta pública, única accesible desde el navegador
│   ├── index.php           🚀 PUNTO DE ENTRADA ÚNICO (Front Controller)
│   ├── .htaccess           ⚙️ (Opcional, pero recomendado) Reglas para que Apache envíe todo a index.php
│   ├── css/                🎨 Archivos CSS (ej: style.css, tailwind.css)
│   ├── js/                 ⚡️ Archivos JavaScript (ej: main.js)
│   └── assets/             🖼️ Imágenes, fuentes, íconos, etc.
│
├── src/                    🧠 Código fuente de la aplicación (protegido del acceso directo)
│   ├── Core/               🛠️ Clases centrales que hacen funcionar la aplicación
│   │   ├── Database.php    🗃️ Lógica de conexión a la base de datos (PDO)
│   │   └── Router.php      🗺️ Lógica para manejar las rutas/URLs y llamar controladores
│   │
│   ├── Controllers/        🚦 Controladores que reciben peticiones y orquestan la respuesta
│   │   ├── MemberController.php
│   │   ├── ClassController.php
│   │   └── PaymentController.php
│   │
│   ├── Models/             📦 Modelos que representan los datos e interactúan con la BD
│   │   ├── Member.php
│   │   ├── GymClass.php
│   │   └── Payment.php
│   │
│   └── Views/              🖼️ Plantillas HTML y PHP para la presentación al usuario
│       ├── layouts/          뼈 Estructura principal de la página (esqueleto)
│       │   ├── header.php
│       │   └── footer.php
│       │
│       ├── components/       🧩 Componentes reutilizables (piezas de Lego)
│       │   ├── sidebar.php
│       │   ├── search-bar.php
│       │   └── button.php
│       │
│       ├── members/          👨‍👩‍👧‍👦 Vistas específicas del módulo de Socios
│       │   ├── index.view.php   (Para listar todos los socios)
│       │   ├── create.view.php  (Formulario para crear un socio)
│       │   ├── edit.view.php    (Formulario para editar un socio)
│       │   └── show.view.php    (Para ver el perfil de un solo socio)
│       │
│       └── payments/         💵 Vistas específicas del módulo de Pagos
│           └── index.view.php
│
├── config/                 🔑 Archivos de configuración
│   └── config.php          🔒 Credenciales de BD, claves API, etc. (¡Nunca subir a un repo público!)
│
├── vendor/                 📚 Dependencias instaladas con Composer (se crea y gestiona sola)
│
└── composer.json           📄 Archivo que define las dependencias del proyecto para Composer