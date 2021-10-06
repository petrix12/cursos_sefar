# Plataforma de **Cursos Sefar**
+ **Plataforma en producción en AWS**:
+ **Plataforma de prueba en Heroku**: https://cursos-sefar.herokuapp.com
+ **Repositorio en GitHub**: https://github.com/petrix12/cursos_sefar

## Antes de iniciar:
1. Crear proyecto en la página de [GitHub](https://github.com) con el nombre: **cursos_sefar**.
    + **Description**: Elaboración de una plataforma de cursos a ofrecer la trasnacional Sefar Universal.
    + **Public**.
2. En la ubicación raíz del proyecto en la terminal de la máquina local:
    + $ git init
    + $ git add .
    + $ git commit -m "Commit 000: Antes de iniciar"
    + $ git branch -M main
    + $ git remote add origin https://github.com/petrix12/cursos_sefar.git
    + $ git push -u origin main

## Preparación del entorno de desarrollo:
1. Páginas de documentación:
	+ [Laravel](https://laravel.com/docs/8.x)
2. Programas necesarios
    + [Git](https://git-scm.com/downloads)
    + [XAMPP](https://www.apachefriends.org/es/download.html)
    + [Composer](https://getcomposer.org)
    + [Visual Studio Code](https://code.visualstudio.com/download)
    + [Node Js](https://nodejs.org)
    + [Workbench](https://dev.mysql.com/downloads/workbench)
3. Instalar el instalador de Laravel:
    + $ composer global require laravel/installer
4. Extensiones requeridas en **Visual Studio Code**:
    + Laravel Blade Snippets
        + Winnie Lin
        + Laravel blade snippets and syntax highlight support
    + Laravel goto view
        + codingyu
        + Quick jump to view
    + Laravel Snippets
        + Winnie Lin
        + Laravel snippets for Visual Studio Code (Support Laravel 5 and above)
    + PHP Intelephense
        + Ben Mewburn
        + PHP code intelligence for Visual Studio Code
    + Tailwind CSS IntelliSense
        + Brad Cornes
        + Intelligent Tailwind CSS tooling for VS Code
5. Aumentar la memoria límite de PHP para evitar errores en la instalación de paquetes:
    + Abrir el archivo **C:\xampp\php\php.ini**.
    + Cambiar el valor:
      + De:
        ```ini
        memory_limit=512M
        ```
      + A:
        ```ini
        memory_limit=-1
        ```

## Creación del proyecto
+ [Ayuda para crear un dominio local](https://codersfree.com/blog/como-generar-un-dominio-local-en-windows-xampp)
1. Crear proyecto **Cursos Sefar**:
    + $ laravel new cursos_sefar --jet
    + Which Jetstream stack do you prefer?
        [0] livewire
        [1] inertia
    + Respuesta: **0**
    + Will your application use teams? (yes/no) [no]: **no**
    + Ingresar a la carpeta raíz del nuevo proyecto.
    + $ npm install
    + $ npm run dev
2. Cambiar el valor de las siguientes variables de entorno en .env:
    ```env
    APP_NAME="Plataforma de Cursos Sefar"
    APP_URL=http://cursos.sefar.test
    DB_DATABASE=sefar_cursos
    FILESYSTEM_DRIVER=public
    ```
3. Crear base de datos **sefar_cursos**.
    + **Nota**: escoger juego de caracteres: utf8_general_ci 
4. Ejecutar las migraciones:
    + $ php artisan migrate
5. Abrir el archivo: **C:\Windows\System32\drivers\etc\hosts** como administrador y en la parte final del archivo escribir.
	```
	127.0.0.1	cursos.sefar.test
	```
5. Guardar y cerrar.
6. Abri el archivo de texto plano de configuración de Apache **C:\xampp\apache\conf\extra\httpd-vhosts.conf**.
7. Ir al final del archivo y anexar lo siguiente:
	+ Si nunca has creado un virtual host agregar:
		```conf
		<VirtualHost *>
			DocumentRoot "C:\xampp\htdocs"
			ServerName localhost
		</VirtualHost>
		```
		+ **Nota**: Esta estructura se agrega una única vez.
	+ Luego agregar:
		```conf
		<VirtualHost *>
			DocumentRoot "C:\xampp\htdocs\sefar\cursos_sefar\public"
			ServerName cursos.sefar.test
			<Directory "C:\xampp\htdocs\sefar\cursos_sefar\public">
				Options All
				AllowOverride All
				Require all granted
			</Directory>
		</VirtualHost>
		```
8. Guardar y cerrar.
9. Reiniciar el servidor Apache.
    + **Nota 1**: ahora podemos ejecutar nuestro proyecto local en el navegador introduciendo la siguiente dirección: http://cursos.sefar.test
    + **Nota 2**: En caso de que no funcione el enlace, cambiar en el archivo **C:\xampp\apache\conf\extra\httpd-vhosts.conf** todos los segmentos de código **<VirtualHost \*>** por **<VirtualHost *:80>**.
10. Crear commit:
    + $ git add .
    + $ git commit -m "Creación del proyecto"
    + $ git push -u origin main

## Diseño Entidad - Relación:
1. Entidades:
	1. **users**:
        + id (INT).
        + name (VARCHAR).
        + email (VARCHAR).
        + password (VARCHAR).
	2. **audiences**:
        + id (INT).
        + name (VARCHAR).
	3. **categories**:
        + id (INT).
        + name (VARCHAR).
	4. **courses**:
        + id (INT).
        + title (VARCHAR).
        + subtitle (VARCHAR).
        + description (VARCHAR).
        + status (INT).   
	5. **descriptions**:
        + id (INT).
        + name (VARCHAR).
	6. **goals**:
        + id (INT).
        + name (VARCHAR).
	7. **lessons**:
        + id (INT).
        + name (VARCHAR).
        + url (VARCHAR).
        + iframe (VARCHAR).
	8. **levels**:
        + id (INT).
        + name (VARCHAR).
	9. **platforms**:
        + id (INT).
        + name (VARCHAR).
	10. **prices**:
        + id (INT).
        + name (VARCHAR).
        + value (INT).
	11. **profiles**:
        + id (INT).
        + title (VARCHAR).
        + biography (TEXT).
        + website (VARCHAR).
        + facebook (VARCHAR).
        + lnkedin (VARCHAR).
        + youtube (VARCHAR).
	12.  **requirements**:
        + id (INT).
        + name (VARCHAR).
	13. **reviews**:
        + id (INT).
        + comment (VARCHAR).
        + rating (VARCHAR).
	14. **sections**:
        + id (INT).
        + name (VARCHAR).
	15. **observations**:
		+ id (INT).
		+ body (TEXT).
2. Entidades polimórficas:
	17. **comments**:
        + id (INT).
        + name (VARCHAR).
        + commentable_id (INT).
        + commentable_type (VARCHAR).
	18. **images**:
        + id (INT).
        + url (VARCHAR).
        + imageable_id (INT).
        + imageable_type (VARCHAR).
	19. **resources**:
        + id (INT).
        + url (VARCHAR).
        + resourceable_id (INT).
        + resourceable_type (VARCHAR).
	20. **reactions**:	<!-- likes -->
        + id (INT).
        + value (INT).
        + reactionable_id (INT).
        + reactionable_type (VARCHAR).
3. Entidades pivote:
    1. **course_user**.
    2. **lesson_user**.
4. Relaciones:
    1. **n:m courses - users**.
    2. **1:n courses - audiences**.
    3. **1:n courses - course_user**.
    4. **1:n courses - goals**.
    5. **1:n courses - requirements**.
    6. **1:n courses - reviews**.
    7. **1:n courses - sections**.
    8. **1:n categories - courses**.
    9. **n:m lessons - users**.
    10. **1:n lesson - lesson_user**.
    11. **1:1 lessons - descriptions**.
    12. **1:n levels - courses**.
    13. **1:n platforms - lessons**.
    14. **1:n prices - courses**. 
    15. **1:1 profiles - users**.
    16. **1:n sections - lessons**.
    17. **1:n users - comments**.
    18. **1:n users - course_user**.  
    19. **1:n users - lesson_user**.
    20. **1:n users - likes**.
    21. **1:n users - reviews**.

## Creación de modelos y migraciones:
+ **Nota**: Estos comandos deben ejecutarse en el orden propuesto.
1. Creación de modelos parte i:
	+ $ php artisan make:model Level -m
	+ $ php artisan make:model Category -m
	+ $ php artisan make:model Price -m
	+ $ php artisan make:model Course -m
2. Creación migración para tabla pivote **course_user**:
	+ $ php artisan make:migration create_course_user_table
3. Creación de modelos parte ii:
	+ $ php artisan make:model Review -m
	+ $ php artisan make:model Profile -m
	+ $ php artisan make:model Goal -m
	+ $ php artisan make:model Requeriment -m
	+ $ php artisan make:model Audience -m
	+ $ php artisan make:model Section -m
	+ $ php artisan make:model Platform -m
	+ $ php artisan make:model Lesson -m
	+ $ php artisan make:model Description -m
4. Creación migración para tabla pivote **lesson_user**:
	+ $ php artisan make:migration create_lesson_user_table
5. Creación de modelos parte iii:
	+ $ php artisan make:model Resource -m
	+ $ php artisan make:model Comment -m
	+ $ php artisan make:model Reaction -m
	+ $ php artisan make:model Image -m
	+ $ php artisan make:model Observation -m
6. Crear commit:
    + $ git add .
    + $ git commit -m "Creación de modelos y migraciones"
    + $ git push -u origin main

## Definición de las migraciones:
1. Definición del método **up** para la migración **levels**:
    ```php
	public function up()
	{
		Schema::create('levels', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->timestamps();
		});
	}
    ```
2. Definición del método **up** para la migración **categories**:
    ```php
	public function up()
	{
		Schema::create('categories', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->timestamps();
		});
	}
    ```
3. Definición del método **up** para la migración **prices**:
    ```php
	public function up()
	{
		Schema::create('prices', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->float('value');
			$table->timestamps();
		});
	}
    ```
4. Definición del método **up** para la migración **courses**:
    ```php
	public function up()
	{
		Schema::create('courses', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('subtitle');
			$table->text('description');
			$table->enum('status', [Course::BORRADOR,Course::REVISION,Course::PUBLICADO])->default(Course::BORRADOR);
			$table->string('slug');
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('level_id')->nullable();
			$table->unsignedBigInteger('category_id')->nullable();
			$table->unsignedBigInteger('price_id')->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
			$table->foreign('price_id')->references('id')->on('prices')->onDelete('set null');
			$table->timestamps();
		});
	}
    ```
    + Importar la definción del modelo **Course**:
    ```php
    use App\Models\Course;
    ```
    + Definir las constantes **BORRADOR**, **REVISION** y **PUBLICADO** en el modelo **Course**:
    ```php
    class Course extends Model
    {
        use HasFactory;

        const BORRADOR = 1;
        const REVISION = 2;
        const PUBLICADO = 3;
    }
    ```
5. Definición del método **up** para la migración **course_user**:
    ```php
	public function up()
	{
		Schema::create('course_user', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('course_id');
			$table->unsignedBigInteger('user_id');
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});
	}
    ```
6. Definición del método **up** para la migración **reviews**:
    ```php
	public function up()
	{
		Schema::create('reviews', function (Blueprint $table) {
			$table->id();
			$table->text('comment');
			$table->integer('rating');
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('course_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->timestamps();
		});
	}
    ```
7. Definición del método **up** para la migración **profiles**:
    ```php
	public function up()
	{
		Schema::create('profiles', function (Blueprint $table) {
			$table->id();
			$table->string('title')->nullable();
			$table->text('biography')->nullable();
			$table->string('website')->nullable();
			$table->string('facebook')->nullable();
			$table->string('linkedin')->nullable();
			$table->string('youtube')->nullable();
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});
	}
    ```
8. Definición del método **up** para la migración **goals**:
    ```php
	public function up()
	{
		Schema::create('goals', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->unsignedBigInteger('course_id');
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->timestamps();
		});
	}
    ```
9. Definición del método **up** para la migración **requeriments**:
    ```php
	public function up()
	{
		Schema::create('requeriments', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->unsignedBigInteger('course_id');
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->timestamps();
		});
	}
    ```
10. Definición del método **up** para la migración **audiences**:
    ```php
	public function up()
	{
		Schema::create('audiences', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->unsignedBigInteger('course_id');
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->timestamps();
		});
	}
    ```
11. Definición del método **up** para la migración **sections**:
    ```php
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }
    ```
12. Definición del método **up** para la migración **platforms**:
    ```php
    public function up()
    {
        Schema::create('platforms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }
    ```
13. Definición del método **up** para la migración **lessons**:
    ```php
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->string('iframe');
            $table->unsignedBigInteger('platform_id')->nullable();
            $table->unsignedBigInteger('section_id');
            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('set null');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->timestamps();
        });
    }
    ```
14. Definición del método **up** para la migración **descriptions**:
    ```php
    public function up()
    {
        Schema::create('descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            $table->timestamps();
        });
    }
    ```
15. Definición del método **up** para la migración **lesson_user**:
    ```php
    public function up()
    {
        Schema::create('lesson_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    ```
16. Definición del método **up** para la migración **resources**:
    ```php
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('resourceable_id');
            $table->string('resourceable_type');
            $table->timestamps();
        });
    }
    ```
17. Definición del método **up** para la migración **comments**:
    ```php
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    ```
18. Definición del método **up** para la migración **reactions**:
    ```php
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->enum('value',[Reaction::LIKE, Reaction::DISLIKE]);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reactionable_id');
            $table->string('reactionable_type');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    ```
    + Importar la definción del modelo **Reaction**:
    ```php
    use App\Models\Reaction;
    ```
    + Definir las constantes **LIKE** y **DISLIKE** en el modelo **Reaction**:
    ```php
    class Reaction extends Model
    {
        use HasFactory;

        const LIKE = 1;
        const DISLIKE = 2;
    }
    ```
19. Definición del método **up** para la migración **images**:
    ```php
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('imageable_id');
            $table->string('imageable_type');
            $table->timestamps();
        });
    }
    ```
20. Definición del método **up** para la migración **observations**:
    ```php
    public function up()
    {
        Schema::create('observations', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }
    ```
21. Ejecutar migraciones:
    + $ php artisan migrate
22. Crear commit:
    + $ git add .
    + $ git commit -m "Definición de las migracione"
    + $ git push -u origin main



***
≡
    ```php
    ***
    ```
22. Crear commit:
    + $ git add .
    + $ git commit -m "Definición de las migracione"
    + $ git push -u origin main

********* INICIO



### Video 5. Creación de base de datos - Parte 1     


2.  Establecer relación entre el modelo **User** y los modelos **Profile**, **Course** y **Review**.
    Modelo **User** (**app\Models\User.php**);
    >
        ≡
        class User extends Authenticatable
        {
            ≡
            // Relación 1:1 User - Profile
            public function profile(){
                return $this->hasOne('App\Models\Profile');
            }

            // Relación 1:n Profesores y Cursos (User - Course)
            public function courses_dictated(){
                return $this->hasMany('App\Models\Course');
            }

            // Relación n:n Estudiantes y Cursos (User - Course)
            public function courses_enrolled(){
                return $this->belongsToMany('App\Models\Course');
            }

            // Relación 1:n User - Review
            public function reviews(){
                return $this->hasMany('App\Models\Review');
            }
        }
    Modelo **Profile** (**app\Models\Profile.php**)
    >
        ≡
        class Profile extends Model
        {
            ≡
            // Relación 1:1 Profile - User (Inversa)
            public function user(){
                return $this->belongsTo('App\Models\User');
            }
        }
    Modelo **Course** (**app\Models\Course.php**)
    >
        ≡
        class Course extends Model
        {
            ≡
            // Relación 1:n Profesores y Cursos (User - Course) (inversa)
            public function teacher(){
                return $this->belongsTo('App\Models\User', 'user_id');
            }

            // Relación n:n Estudiantes y Cursos (User - Course) (inversa)
            public function students(){
                return $this->belongsToMany('App\Models\User');
            }
        }
    Modelo **Review** (**app\Models\Review.php**)
    >
        ≡
        class Review extends Model
        {
            ≡
            // Relación 1:n User - Review (inversa)
            public function user(){
                return $this->belongsTo('App\Models\User');
            }
        }
3.  Establecer relación entre el modelo **Course** y los meodelos **Review**, **Level**, **Category** y **Price**.
    Modelo **Course** (**app\Models\Course.php**)
    >
        ≡
        class Course extends Model
        {
            ≡
            // Relación 1:n Course - Review
            public function reviews(){
                return $this->hasMany('App\Models\Review');
            }

            // Relación 1:n Price - Course (inversa)
            public function price(){
                return $this->belongsTo('App\Models\Price');
            }

            // Relación 1:n Level - Course (inversa)
            public function level(){
                return $this->belongsTo('App\Models\Level');
            }

            // Relación 1:n Category - Course (inversa)
            public function category(){
                return $this->belongsTo('App\Models\Category');
            }
        }
    Modelo **Review** (**app\Models\Review.php**)
    >
        ≡
        class Review extends Model
        {
            ≡   
            // Relación 1:n Course - Review (inversa)
            public function course(){
                return $this->belongsTo('App\Models\Course');
            }
        }
    Modelo **Level** (**app\Models\Level.php**)
    >
        ≡
        class Level extends Model
        {
            ≡
            // Relación 1:n Level - Course
            public function courses(){
                return $this->hasMany('App\Models\Course');
            }
        }
    Modelo **Category** (**app\Models\Category.php**)
    >
        ≡
        class Category extends Model
        {
            ≡
            // Relación 1:n Category - Course
            public function courses(){
                return $this->hasMany('App\Models\Course');
            }
        }
    Modelo **Price** (**app\Models\Price.php**)
    >
        ≡
        class Price extends Model
        {
            ≡
            // Relación 1:n Price - Course
            public function courses(){
                return $this->hasMany('App\Models\Course');
            }
        }


### Video 6. Creación de base de datos - Parte 2
1. Ejecutar las migraciones:
    >
        $ php artisan migrate
2. Establecer relación entre el modelo **Course** y los modelos **Requeriment**, **Goal**, **Audience** y **Section**.
    Modelo **Course** (**app\Models\Course.php**);
    >
        ≡
        class Course extends Model
        {
            ≡   
            // Relación 1:n Course - Requeriment
            public function requeriments(){
                return $this->hasMany('App\Models\Requeriment');
            }

            // Relación 1:n Course - Goal
            public function goals(){
                return $this->hasMany('App\Models\Goal');
            }

            // Relación 1:n Course - Audience
            public function audiences(){
                return $this->hasMany('App\Models\Audience');
            }

            // Relación 1:n Course - Section
            public function sections(){
                return $this->hasMany('App\Models\Section');
            }
        }
    Modelo **Requeriment** (**app\Models\Requeriment.php**);
    >
        ≡
        class Requeriment extends Model
        {
            ≡
            // Relación 1:n Course - Requeriment (inversa)
            public function course(){
                return $this->belongsTo('App\Models\Course');
            }
        }
    Modelo **Goal** (**app\Models\Goal.php**);
    >
        ≡
        class Goal extends Model
        {
            ≡
            // Relación 1:n Course - Goal (inversa)
            public function course(){
                return $this->belongsTo('App\Models\Course');
            }
        }
    Modelo **Audience** (**app\Models\Audience.php**);
    >
        ≡
        class Audience extends Model
        {
            ≡
            // Relación 1:n Course - Audience (inversa)
            public function course(){
                return $this->belongsTo('App\Models\Course');
            }
        }
    Modelo **Section** (**app\Models\Section.php**);
    >
        ≡
        class Audience extends Section
        {
            ≡
            // Relación 1:n Course - Section (inversa)
            public function course(){
                return $this->belongsTo('App\Models\Course');
            }
        }
3.  Ejecutar migraciones:
    >
        $ php artisan migrate
4.  Establecer relaciones entre el modelo **Lesson** y los modelos: **Section**, **Platform**, **Description** y **User**.
    Modelo **Lesson** (**app\Models\Lesson.php**)
    >
        ≡
        class Lesson extends Model
        {
            ≡
            // Ralción 1:n Section -Lesson (inversa)
            public function section(){
                return $this->belongsTo('App\Models\Section');
            }

            // Ralción 1:n Platform -Lesson (inversa)
            public function platform(){
                return $this->belongsTo('App\Models\Platform');
            }

            // Relación 1:1 Lesson - Description
            public function description(){
                return $this->hasOne('App\Models\Description');
            }

            // Relacion n:n Lesson - User
            public function users(){
                return $this->belongsToMany('App\Models\User');
            }        
        }
    Modelo **Section** (**app\Models\Section.php**)
    >
        ≡
        class Section extends Model
        {
            ≡
            // Ralción 1:n Section -Lesson
            public function lessons(){
                return $this->hasMany('App\Models\Lesson');
            }
        }
    Modelo **Platform** (**app\Models\Platform.php**)
    >
        ≡
        class Platform extends Model
        {
            ≡
            // Ralción 1:n Platform -Lesson
            public function lessons(){
                return $this->hasMany('App\Models\Lesson');
            }
        }
    Modelo **Description** (**app\Models\Description.php**)
    >
        ≡
        class Description extends Model
        {
            ≡
            // Relación 1:1 Lesson - Description (inversa)
            public function lesson(){
                return $this->belongsTo('App\Models\Lesson');
            }
        }
    Modelo **User** (**app\Models\User.php**)
    >
        ≡
        class User extends Model
        {
            ≡
            // Relacion n:n Lesson - User (inversa)
            public function lessons(){
                return $this->belongsToMany('App\Models\Lesson');
            }
        }


### Video 7. Creación de base de datos - Parte 3
1. Importar modelo **Reaction** a su migración en **database\migrations\2021_04_19_115056_create_reactions_table.php**
    >
        use App\Models\Reaction;
2. Ejecutar migraciones:
    >
        $ php artisan migrate
3.  Establecer relación polimorfica en el modelo **Comment** en **app\Models\Comment.php**
    >
        ≡
        class Comment extends Model
        {
            ≡
            public function commentable(){
                return $this->morphTo();
            }
        }
4.  Establecer relación polimorfica en el modelo **Reaction** en **app\Models\Reaction.php**
    >
        ≡
        class Reaction extends Model
        {
            ≡
            public function reactionable(){
                return $this->morphTo();
            }
        }
5.  Establecer relación polimorfica en el modelo **Image** en **app\Models\Image.php**
    >
        ≡
        class Image extends Model
        {
            ≡
            public function imageable(){
                return $this->morphTo();
            }
        }
6.  Establecer relación polimorfica en el modelo **Resource** en **app\Models\Resource.php**
    >
        ≡
        class Resource extends Model
        {
            ≡
            public function resourceable(){
                return $this->morphTo();
            }
        }
10. Establecer relaciones polimorficas entre el modelo **Lesson** y los modelos **Resource**, **Comment**, **Reaction** e **Image**.
    Modelo **Lesson** (**app\Models\Lesson.php**)
    >
        ≡
        class Lesson extends Model
        {
            ≡
            // Relación 1:1 polimorfica Lesson - Resource
            public function resource(){
                return $this->morphOne('App\Models\Resource','resourceable');
            }

            // Relación 1:n polimorfica Lesson - Comment
            public function comments(){
                return $this->morphMany('App\Models\Comment','commentable');
            }

            // Relación 1:n polimorfica Lesson - Reaction
            public function reactions(){
                return $this->morphMany('App\Models\Reaction','reactionable');
            }
        }

    Modelo **Comment** (**app\Models\Comment.php**)
    >
        ≡
        class Comment extends Model
        {
            ≡
            // Relación 1:n polimorfica
            public function comments(){
                return $this->morphMany('App\Models\Comment','commentable');
            }
            
            public function reactions(){
                return $this->morphMany('App\Models\Reaction','reactionable');
            }
        }
11. Establecer relación polimorfica entre los modelos **Course** e **Image**.
    Modelo **Course** (**app\Models\Course.php**)
    >
        ≡
        class Course extends Model
        {
            ≡
            // Relación 1:1 polimorfica Course - Image
            public function image(){
                return $this->morphOne('App\Models\Image','imageable');
            }
        }
12. Establecer ralción **Course**, **Lesson**, **Section**.
    Modelo **Course** (**app\Models\Course.php**)
    >
        ≡
        class Course extends Model
        {
            ≡
            // Relación entre Course - Lesson y Section como tabla intermedia
            public function lessons(){
                return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
            }
        }
13. Relación entre el modelo **User** y los modelos **Comment** y **Reaction**.
    Modelo **User** (**app\Models\User.php**)
    >
        ≡
        class User extends Model
        {
            ≡
            // Relación 1:n User - Comment
            public function comments(){
                return $this->hasMany('App\Models\Comment');
            }

            // Relación 1:n User - Reaction
            public function reaction(){
                return $this->hasMany('App\Models\Reaction');
            }
        }
    Modelo **Comment** (**app\Models\Comment.php**)
    >
        ≡
        class Comment extends Model
        {
            ≡
            // Relación 1:n User - Reaction (inversa)
            public function user(){
                return $this->belongsTo('App\Models\User');
            }
        }
    Modelo **Reaction** (**app\Models\Reaction.php**)
    >
        ≡
        class Reaction extends Model
        {
            ≡
            // Relación 1:n User - Reaction (inversa)
            public function user(){
                return $this->belongsTo('App\Models\User');
            }
        }




### Video 8. Habilitar asignación masiva
1. Definir campos de asignación para el modelo **Audience** (app\Models\Audience.php):
    >
        ≡
        class Audience extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Category** (app\Models\Category.php):
    >
        ≡
        class Category extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Comment** (app\Models\Comment.php):
    >
        ≡
        class Comment extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Course** (app\Models\Course.php):
    >
        ≡
        class Course extends Model
        {
            protected $guarded = ['id', 'status'];
            ≡
        }
1. Definir campos de asignación para el modelo **Description** (app\Models\Description.php):
    >
        ≡
        class Description extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Goal** (app\Models\Goal.php):
    >
        ≡
        class Goal extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Image** (app\Models\Image.php):
    >
        ≡
        class Image extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Lesson** (app\Models\Lesson.php):
    >
        ≡
        class Lesson extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Level** (app\Models\Level.php):
    >
        ≡
        class Level extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Platform** (app\Models\Platform.php):
    >
        ≡
        class Platform extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Price** (app\Models\Price.php):
    >
        ≡
        class Price extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Profile** (app\Models\Profile.php):
    >
        ≡
        class Profile extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Reaction** (app\Models\Reaction.php):
    >
        ≡
        class Reaction extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Requeriment** (app\Models\Requeriment.php):
    >
        ≡
        class Requeriment extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Resource** (app\Models\Resource.php):
    >
        ≡
        class Resource extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Review** (app\Models\Review.php):
    >
        ≡
        class Review extends Model
        {
            protected $guarded = ['id'];
            ≡
        }
1. Definir campos de asignación para el modelo **Section** (app\Models\Section.php):
    >
        ≡
        class Section extends Model
        {
            protected $guarded = ['id'];
            ≡
        }


### Video 9. Llenar la bbdd con datos de prueba
1. Generar seeder para usuarios:
    >
        $ php artisan make:seeder UserSeeder
1. En el seeder de usuario (database\seeders\UserSeeder.php):
    Importar modelo **User**:
    >
        use App\Models\User;
    Programar método **run**:
    >
        public function run()
        {
            User::create([
                'name' => 'Pedro Jesús Bazó Canelón',
                'email' => 'bazo.pedro@gmail.com',
                'password' => bcrypt('12345678')
            ]);

            User::factory(99)->create();
        }
1. Invocar seeder de usuario desde método **run** de **database\seeders\DatabaseSeeder.php**
    >
        public function run()
        {
            $this->call(UserSeeder::class);
        }
1. Generar seeder para niveles, categorias y precios:
    >
        $ php artisan make:seeder LevelSeeder
        $ php artisan make:seeder CategorySeeder
        $ php artisan make:seeder PriceSeeder
1. En el seeder de niveles (database\seeders\LevelSeeder.php):
    Importar modelo **Level**:
    >
        use App\Models\Level;
    Programar método **run**:
    >
        public function run()
        {
            Level::create([
                'name' => 'Nivel básico'
            ]);

            Level::create([
                'name' => 'Nivel intermedio'
            ]);
            
            Level::create([
                'name' => 'Nivel avanzado'
            ]);
        }
1. Invocar seeder de niveles desde método **run** de **database\seeders\DatabaseSeeder.php**
    >
        public function run()
        {
            ≡
            $this->call(LevelSeeder::class);
        }
1. En el seeder de categorias (database\seeders\CategorySeeder.php):
    Importar modelo **Category**:
    >
        use App\Models\Category;
    Programar método **run**:
    >
        public function run()
        {
            Category::create([
                'name' => 'Desarrollo web'
            ]);

            Category::create([
                'name' => 'Diseño web'
            ]);
            
            Category::create([
                'name' => 'Programación'
            ]);
        }
1. Invocar seeder de precios desde método **run** de **database\seeders\DatabaseSeeder.php**
    >
        public function run()
        {
            ≡
            $this->call(CategorySeeder::class);
        }
1. En el seeder de precios (database\seeders\PriceSeeder.php):
    Importar modelo **Price**:
    >
        use App\Models\Price;
    Programar método **run**:
    >
        public function run()
        {
            Price::create([
                'name' => 'Gratis',
                'value' => 0
            ]);

            Price::create([
                'name' => '19.99 US$ (nivel 1)',
                'value' => 19.99
            ]);

            Price::create([
                'name' => '49.99 US$ (nivel 2)',
                'value' => 49.99
            ]);

            Price::create([
                'name' => '99.99 US$ (nivel 3)',
                'value' => 99.99
            ]);
        }
1. Invocar seeder de precios desde método **run** de **database\seeders\DatabaseSeeder.php**
    >
        public function run()
        {
            ≡
            $this->call(PriceSeeder::class);
        }
1. Refrescar la base de datos y ejecutar los seeder:
    >
        $ php artisan migrate:fresh --seed
1. Generar seeder para cursos:
    >
        $ php artisan make:seeder CourseSeeder
1. Generar factory para cursos:
    >
        $ php artisan make:factory CourseFactory
1. Programar el método **definition** del factory cursos (database\factories\CourseFactory.php);
    >
        public function definition()
        {
            $title = $this->faker->sentence();
            return [
                'title' => $title,
                'subtitle' => $this->faker->sentence(),
                'description' => $this->faker->paragraph(),
                'status' => $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO]),
                'slug' => Str::slug($title),
                'user_id' => User::all()->random()->id,
                'level_id' => Level::all()->random()->id,
                'category_id' => Category::all()->random()->id,
                'price_id' => Price::all()->random()->id
            ];
        }
    Importar los modelos Course, User, Level, Category y Price y la clase Str:
    >
        use App\Models\Category;
        use App\Models\Course;
        use App\Models\Level;
        use App\Models\Price;
        use App\Models\User;
        use Illuminate\Support\Str;
1. En el seeder de cursos (database\seeders\CourseSeeder.php):
    Importar modelos **Course** e **Image**:
    >
        use App\Models\Course;
        use App\Models\Image;
    Programar método **run**:
    >
        public function run()
        {
            $courses = Course::factory(40)->create();
            foreach($courses as $course){
                Image::factory(1)->create([
                    'imageable_id' => $course->id,
                    'imageable_type' => 'App\Models\Course'
                ]);
            }   
1. Invocar seeder de cursos desde método **run** de **database\seeders\DatabaseSeeder.php**
    >
        public function run()
        {
            ≡
            $this->call(CourseSeeder::class);
        }
1. Generar factory para imagenes de cursos:
    >
        $ php artisan make:factory ImageFactory
1. Programar el método **definition** del factory imagenes (database\factories\ImageFactory.php);
    >
        ***
1. Indicar la creación de la carpeta **storage/cursos** en **database\seeders\DatabaseSeeder.php**
    Importar clase **Storage**:
    >
        use Illuminate\Support\Facades\Storage;
    Programar en el método **run** la creación de la carpeta
    >
        public function run()
        {
            Storage::deleteDirectory('cursos');
            Storage::makeDirectory('cursos');
            ≡
        }
1. Refrescar la base de datos y ejecutar los seeder:
    >
        $ php artisan migrate:fresh --seed
1. Generar factory para los requerimientos, metas, audiencias y secciones:
    >
        $ php artisan make:factory RequerimentFactory
        $ php artisan make:factory GoalFactory
        $ php artisan make:factory AudienceFactory
        $ php artisan make:factory SectionFactory
1. Para los factory requerimientos, metas, audiencias y secciones, programar la generación campo **name** en el método **definition** de sus respectivos factories.
    >
        public function definition()
        {
            return [
                'name' => $this->faker->sentence()
            ];
        }
1. Generar los seeder en cursos para los requerimientos, metas, audiencias y secciones en **database\seeders\CourseSeeder.php**
    Importar modelos **Requeriment**, **Goal**, **Audience** y **Section**:
    >
        use App\Models\Audience;
        use App\Models\Goal;
        use App\Models\Requeriment;
        use App\Models\Section;
    Programar método **run**:
    >
        public function run()
        {
            $courses = Course::factory(40)->create();
            foreach($courses as $course){
                ≡
                Requeriment::factory(4)->create([
                    'course_id' => $course->id
                ]);

                Goal::factory(4)->create([
                    'course_id' => $course->id
                ]);

                Audience::factory(4)->create([
                    'course_id' => $course->id
                ]);

                Section::factory(4)->create([
                    'course_id' => $course->id
                ]);
            }
        }
1. Refrescar la base de datos y ejecutar los seeder:
    >
        $ php artisan migrate:fresh --seed
1. Generar seeder para plataformas:
    >
        $ php artisan make:seeder PlatformSeeder
1. Importar el modelo **Platform** y programar método **run** para el seeder plataformas (database\seeders\PlatformSeeder.php)
    Importar modelo:
    >
        use App\Models\Platform;
    Método:
    >
        public function run()
        {
            Platform::create([
                'name' => 'youtube'
            ]);

            Platform::create([
                'name' => 'Vimeo'
            ]);
        }
1. Agregar el seede Platform a **database\seeders\DatabaseSeeder.php** (antes de CourseSeeder)
    >
        public function run()
        {
            Storage::deleteDirectory('cursos');
            Storage::makeDirectory('cursos');

            $this->call(UserSeeder::class);
            $this->call(LevelSeeder::class);
            $this->call(CategorySeeder::class);
            $this->call(PriceSeeder::class);
            $this->call(PlatformSeeder::class);
            $this->call(CourseSeeder::class);
        }  
1. Crear factory para las descripciones:
    >
        $ php artisan make:factory DescriptionFactory
1. Programar método **definition** de **database\factories\DescriptionFactory.php**
    >
        public function definition()
        {
            return [
                'name' => $this->faker->paragraph()
            ];
        }  
1. Generar factory para lecciones:
    >
     $ php artisan make:factory LessonFactory
1. Programar método **definition** en **database\factories\LessonFactory.php**
    >
        public function definition()
        {
            return [
                'name' => $this->faker->sentence(),
                'url' => 'https://youtu.be/z3-Et7jh_gg',
                'iframe' => '<iframe width="727" height="409" src="https://www.youtube.com/embed/KakNd654JMA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
                'platfomr_id' => 1
            ];
        }
1. Redefinir método **run** en **database\seeders\CourseSeeder.php**
    >
        public function run()
        {
            $courses = Course::factory(40)->create();
            foreach($courses as $course){
                Image::factory(1)->create([
                    'imageable_id' => $course->id,
                    'imageable_type' => 'App\Models\Course'
                ]);

                Requeriment::factory(4)->create([
                    'course_id' => $course->id
                ]);

                Goal::factory(4)->create([
                    'course_id' => $course->id
                ]);

                Audience::factory(4)->create([
                    'course_id' => $course->id
                ]);

                $sections = Section::factory(4)->create([
                    'course_id' => $course->id
                ]);

                foreach ($sections as $section) {
                    $lessons = Lesson::factory(4)->create(['section_id' => $section->id]);
                    foreach ($lessons as $lesson) {
                        Description::factory(1)->create(['lesson_id' => $lesson->id]);
                    }
                }
            }
        }
    Importar modelos Lesson y Description:
        use App\Models\Lesson;
        use App\Models\Description;


## Sección 3: Frontend de la aplicación


### Viedo 10. Instalar la plantilla AdminLTE
##### Documentación: https://github.com/jeroennoten/Laravel-AdminLTE
##### Plantilla: https://adminlte.io/themes/v3/index.html
1. En **app\Providers\RouteServiceProvider.php**:
    Cambiar:
    >
        public const HOME = '/dashboard';
    Por:
    >
        public const HOME = '/';
1. Crear archivo de rutas **routes\admin.php**
    >
        <?php

        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\Admin\HomeController;

        Route::get('',[HomeController::class, 'index']);
1. Establecer a **routes\admin.php** como archivo de rutas en **app\Providers\RouteServiceProvider.php** modificando el método **boot**
    >
        public function boot()
        {
            $this->configureRateLimiting();

            $this->routes(function () {
                Route::prefix('api')
                    ->middleware('api')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/api.php'));

                Route::middleware('web')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/web.php'));

                Route::middleware('web', 'auth')
                    ->prefix('admin')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/admin.php'));
            });
        }        
1. Definir contralador para administrador:
    >
        $ php artisan make:controller Admin\HomeController
1. Crear método **index** en el controlador **Admin\HomeController**:
    >
        public function index(){
            return view('admin.index');
        }
1. Integrar AdminLTE: 
	>
		$ composer require jeroennoten/laravel-adminlte
1. Ejecutar: 
	>
		$ php artisan adminlte:install
1. Crear vista **resources\views\admin\index.blade.php**:
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Coders Free</h1>
        @stop

        @section('content')
            <p>Coders Free</p>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')

        @stop


### Viedo 11. Reutilizar la plantilla Jetstream
1. Modificar plantilla **resources\views\layouts\app.blade.php**
    >
        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <title>{{ config('app.name', 'Laravel') }}</title>

                <!-- Fonts -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

                <!-- Styles -->
                <link rel="stylesheet" href="{{ mix('css/app.css') }}">

                @livewireStyles

                <!-- Scripts -->
                <script src="{{ mix('js/app.js') }}" defer></script>
            </head>
            <body class="font-sans antialiased">
                <x-jet-banner />

                <div class="min-h-screen bg-gray-100">
                    @livewire('navigation-menu')

                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
                </div>

                @stack('modals')

                @livewireScripts
            </body>
        </html>
1. Modificar plantilla **resources\views\navigation-menu.blade.php**
    >
        @php
            $nav_links = [
                [
                    'name' => 'Home',
                    'route' => route('home'),
                    'active' => request()->routeIs('home')
                ]
            ];
        @endphp

        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}">
                                <x-jet-application-mark class="block h-9 w-auto" />
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            @foreach ($nav_links as $nav_link)
                                <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                                    {{ $nav_link['name'] }}
                                </x-jet-nav-link>
                            @endforeach
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- Teams Dropdown -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="ml-3 relative">
                                <x-jet-dropdown align="right" width="60">
                                    <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                                {{ Auth::user()->currentTeam->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </x-slot>

                                    <x-slot name="content">
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Team') }}
                                            </div>

                                            <!-- Team Settings -->
                                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                {{ __('Team Settings') }}
                                            </x-jet-dropdown-link>

                                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                    {{ __('Create New Team') }}
                                                </x-jet-dropdown-link>
                                            @endcan

                                            <div class="border-t border-gray-100"></div>

                                            <!-- Team Switcher -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Switch Teams') }}
                                            </div>

                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-jet-switchable-team :team="$team" />
                                            @endforeach
                                        </div>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        @endif

                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">
                            @auth
                                <x-jet-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                            </button>
                                        @else
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                    {{ Auth::user()->name }}

                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </span>
                                        @endif
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Account') }}
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                            {{ __('Profile') }}
                                        </x-jet-dropdown-link>

                                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                {{ __('API Tokens') }}
                                            </x-jet-dropdown-link>
                                        @endif

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-jet-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-jet-dropdown>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                            @endauth
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    @foreach ($nav_links as $nav_link)
                        <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                        </x-jet-responsive-nav-link>
                    @endforeach
                </div>

                <!-- Responsive Settings Options -->
                @auth
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="flex-shrink-0 mr-3">
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </div>
                            @endif

                            <div>
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <!-- Account Management -->
                            <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                {{ __('Profile') }}
                            </x-jet-responsive-nav-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                    {{ __('API Tokens') }}
                                </x-jet-responsive-nav-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-responsive-nav-link>
                            </form>

                            <!-- Team Management -->
                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="border-t border-gray-200"></div>

                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                    {{ __('Team Settings') }}
                                </x-jet-responsive-nav-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                        {{ __('Create New Team') }}
                                    </x-jet-responsive-nav-link>
                                @endcan

                                <div class="border-t border-gray-200"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                                @endforeach
                            @endif
                        </div>
                    </div>
                @else
                    <div class="py-1 border-t border-gray-200">
                        <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            Login
                        </x-jet-responsive-nav-link>
                        <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                            Register
                        </x-jet-responsive-nav-link>
                    </div>
                @endauth
            </div>
        </nav>
1. Publicar componentes de Jetstream:
    ###### https://jetstream.laravel.com/2.x/introduction.html
    >
        $ php artisan vendor:publish --tag=jetstream-views
    Todos los componentes de Jetstream se copiaran a **resources\views\vendor\jetstream\components**
1. Modificar archivo de rutas **routes\web.php**
    >
        <?php

        use Illuminate\Support\Facades\Route;

        Route::get('/', function () {
            return view('welcome');
        })->name('home');

        Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
1. Modificar vista **resources\views\welcome.blade.php**
    >
        <x-app-layout>
            
        </x-app-layout>


### Viedo 12. Clonar repositorio con el avance del curso
###### Repositorio: https://github.com/coders-free/udemy
1. Modificar método **definition** en **database\factories\CourseFactory.php**
    >
        public function definition()
        {
            $title = $this->faker->sentence();
            return [
                'title' => $title,
                'subtitle' => $this->faker->sentence(),
                'description' => $this->faker->paragraph(),
                'status' => $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO]),
                'slug' => Str::slug($title),
                'user_id' => 1, // User::all()->random()->id,
                'level_id' => Level::all()->random()->id,
                'category_id' => Category::all()->random()->id,
                'price_id' => Price::all()->random()->id
            ];
        }   
1. Eliminar proyecto.
1. Clonar repositorio https://github.com/coders-free/udemy
    >
        $ git clone https://github.com/coders-free/udemy.git
1. Cambiar el nombre de la carpeta del proyecto de **udemy** a **codersfree**.
1. Instalar las dependencias de **composer** y **npm**.
    >
        $ composer install
        $ npm install
1. Crear archivo **.env** a partir de **.env.example** y modificar las siguientes variables de entorno:
    + APP_URL=http://codersfree.test
    + DB_DATABASE=codersfree
1. Generar APP_KEY:
    >
        $ php artisan key:generate
1. Generar enlace a almacenamiento:
    >
        $ php artisan storage:link 
1. Refrescar la base de datos:
    >
        $ php artisan migrate:fresh --seed


### Viedo 13. Recuperar registros de cursos
1. Crear contraolador **Home**:
    >
        $ php artisan make:controller HomeController
1. Definir método **__invoke** en el controlador **Home** (app\Http\Controllers\HomeController.php):
    >
        public function __invoke()
        {
            $courses = Course::where('status','3')->latest()->get();
            return view('welcome', compact('courses'));
        }
    Importar el modelo Course:
    >
        use App\Models\Course;
1. Redefinir ruta raíz en **routes\web.php**
    >
        Route::get('/', HomeController::class)->name('home');
    Importar controlador Home:
    >
        use App\Http\Controllers\HomeController;
1. Modificar modelo **Course** (app\Models\Course.php):
    >
        ≡
        class Course extends Model
        {
            ≡
            protected $guarded = ['id', 'status'];
            protected $withCount = ['students', 'reviews'];

            const BORRADOR = 1;
            const REVISION = 2;
            const PUBLICADO = 3;

            public function getRatingAttribute(){
                if($this->reviews_count){
                    return round($this->reviews->avg('rating'), 1);
                }else{
                    return 5;
                }
            }
            ≡
        }


### Viedo 14. Diseña el home de la plataforma
###### https://tailwindcomponents.com/
###### https://tailwindcss.com/docs
###### https://v1.tailwindcss.com/components
1. Buscar y descargar una imagen de portada para el curso (de 1920 x 1280).
    ###### https://pixabay.com/es/
    ###### https://www.pexels.com/es-es/
1. Optimizar imagen:
    + Ir a https://tinypng.com/
1. Guardar imagen en el proyecto:
    + public\img\home\img_portada.jpg
1. Modificar vista **welcome** (resources\views\welcome.blade.php):
    >
        <x-app-layout>
            <section class="bg-cover" style="background-image: url({{ asset('img/home/img_portada.jpg') }})">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
                    <div class="w-full md:w-3/4 lg:w-1/2">
                        <h1 class="text-blue-900 font-bold text-4xl">Domina la tecnología web con Coders Free</h1>
                        <p class="text-blue-900 text-lg mt-2 mb-4">En Coders Free encontrarás cursos, manuales y artículos que te ayudarán a convertirte en un profesional del desarrollador web</p>
                        <!-- component extraido de https://tailwindcomponents.com/component/search-bar -->
                        <div class="pt-2 relative mx-auto text-gray-600">
                            <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                            type="search" name="search" placeholder="Search">
                            <!-- extraido de https://v1.tailwindcss.com/components/buttons -->
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                                Buscar
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mt-24">
                <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                    <article>
                        <figure>
                            <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/imagen_1.jpg') }}" alt="">
                        </figure>
                        <header class="mt-2">
                            <h1 class="text-center text-xl text-gray-700">Cursos y proyectos</h1>
                        </header>
                        <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, possimus accusantium</p>
                    </article>
                    <article>
                        <figure>
                            <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/imagen_2.jpg') }}" alt="">
                        </figure>
                        <header class="mt-2">
                            <h1 class="text-center text-xl text-gray-700">Manual de Laravel</h1>
                        </header>
                        <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, possimus accusantium</p>
                    </article>
                    <article>
                        <figure>
                            <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/imagen_3.jpg') }}" alt="">
                        </figure>
                        <header class="mt-2">
                            <h1 class="text-center text-xl text-gray-700">Blog</h1>
                        </header>
                        <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, possimus accusantium</p>
                    </article>
                    <article>
                        <figure>
                            <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/imagen_4.jpg') }}" alt="">
                        </figure>
                        <header class="mt-2">
                            <h1 class="text-center text-xl text-gray-700">Desarrollo web</h1>
                        </header>
                        <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, possimus accusantium</p>
                    </article>
                </div>
            </section>
            <section class="mt-24 bg-gray-700 py-12">
                <h1 class="text-center text-white text-3xl">¿No sabes qué curso llevar?</h1>
                <p class="text-center text-white">Dirígete al catálogo de cursos y filtralos por categoría o nivel</p>
                <div class="flex justify-center mt-4">
                    <!-- https://v1.tailwindcss.com/components/buttons -->
                    <a href="{{ route('courses.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Catálogo de cursos
                    </a>
                </div>
            </section>
            <section class="my-24">
                <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>
                <p class="text-center text-gray-500 text-sm mb-6">Trabajo duro para seguir subiendo cursos</p>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                    @foreach ($courses as $course)
                        <article class="bg-white shadow-lg rounded overflow-hidden">
                            <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                            <div class="px-6 py-4">
                                <h1 class="text-xl text-gray-700 mb-2 leading-6">{{ Str::limit($course->title, 40) }}</h1>
                                <p class="text-gray-500 text-sm mb-2">Prof. {{ $course->teacher->name }}</p>
                                <div class="flex">
                                    <ul class="flex text-sm">
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                                        </li>
                                    </ul>
                                    <p class="text-sm text-gray-500 ml-auto">
                                        <i class="fas fa-users"></i>
                                        ({{ $course->students_count }})
                                    </p>
                                </div>
                                <a href="{{ route('courses.show', $course) }}" class="block text-center w-full mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Mas información
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        </x-app-layout>
1. Descargar 4 imagenes (640 x 426) al azar en https://pixabay.com/es/ y guardarlas en **public\img\home** con los nombres:
    + imagen_1.jpg
    + imagen_2.jpg
    + imagen_3.jpg
    + imagen_4.jpg
1. Generar ruta cursos en **routes\web.php**
    >
        Route::get('cursos', function(){
            return "Aquí se mostrará la lista de cursos";
        })->name('courses.index');
1. Importar los estilos de **fontawesome-free** en **resources\views\layouts\app.blade.php**
    >
        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                ≡
                <!-- Styles -->
                ≡
                <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
                ≡
            </head>
            ≡­
        </html>
1. Modificar método run de **database\seeders\CourseSeeder.php**
    >
        public function run()
        {
            $courses = Course::factory(100)->create();
            ≡
        }
1. Ejecutar:
    >
        $ php artisan migrate:fresh --seed
1. Modificar el método **__invoke** de **app\Http\Controllers\HomeController.php**
    >
        public function __invoke()
        {
            $courses = Course::where('status','3')->latest()->get()->take(12);
            ≡
        }       
1. Generar ruta ir a un curso en partícular en **routes\web.php**
    >
        Route::get('cursos/{course}', function($course){
            return "Aquí se va a mostrar la información del curso";
        })->name('courses.show');
1. Agregar método **getRouteKeyName** al modelo **app\Models\Course.php**
    >
        public function getRouteKeyName(){
            return "slug";
        }


MINUTO 48

### Viedo 15. Diseñando la vista index de cursos
1. Modificar **resources\views\navigation-dropdown.blade.php**:
    >
        @php
            $nav_links = [
                [
                    'name' => 'Home',
                    'route' => route('home'),
                    'active' => request()->routeIs('home')
                ],
                [
                    'name' => 'Cursos',
                    'route' => route('courses.index'),
                    'active' => request()->routeIs('courses.index')
                ],
            ];
        @endphp
        ≡
1. Crear controlador **Course**:
    >
        $ php artisan make:controller CourseController       
1. Crear método **index** en **app\Http\Controllers\CourseController.php**:
    >
        public function index(){
            return view('courses.index');
        }
1. Modificar la ruta **cursos** en **routes\web.php**:
    >
        Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');
    Importar el controlador **Course**:
    >
        use App\Http\Controllers\CourseController;
1. Crear vista **resources\views\courses\index.blade.php**:
    >
        <x-app-layout>
            <section class="bg-cover" style="background-image: url({{ asset('img/cursos/img_cursos.jpg') }})">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
                    <div class="w-full md:w-3/4 lg:w-1/2">
                        <h1 class="text-white font-bold text-4xl">Los mejores cursos de programación ¡GRATIS! y en español.</h1>
                        <p class="text-white text-lg mt-2 mb-4">Si estás buscando potenciar tus conocimientos de programación, has llegado al lugar adecuado. Encuentra cursos y proyectos que te ayudarán en ese proceso</p>
                        <!-- component extraido de https://tailwindcomponents.com/component/search-bar -->
                        <div class="pt-2 relative mx-auto text-gray-600">
                            <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                            type="search" name="search" placeholder="Search">
                            <!-- extraido de https://v1.tailwindcss.com/components/buttons -->
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                                Buscar
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            @livewire('course-index')
        </x-app-layout>
1. Descargar imagen (1920 x 1281) en https://pixabay.com/es/ y nombrarla:
    + public\img\cursos\img_cursos.jpg
1. Optimizar imagen en https://tinypng.com/
1. Crear componente de livewire **CourseIndex**:
    >
        $ php artisan make:livewire CourseIndex
1. Modificar **resources\views\livewire\course-index.blade.php**
    >
        <div>
            <div class="bg-gray-200 mb-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
                    <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4">
                        <i class="fas fa-archway text-xs mr-2"></i>
                        Todos los cursos
                    </button>
                    
                    <!-- Dropdown Categoria -->
                    <div class="relative mr-4" x-data="{ open: false }">
                        <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">
                            <i class="fas fa-tags text-sm mr-2"></i>
                            Categoria
                            <i class="fas fa-angle-down text-sm ml-2"></i>
                        </button>
                        <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                            <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">Settings</a>
                            <div class="py-2">
                                <hr></hr>
                            </div>
                            <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">    
                                Logout
                            </a>
                        </div> 
                    </div>
                    
                    <!-- Dropdown Niveles -->
                    <div class="relative" x-data="{ open: false }">
                        <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">
                            <i class="fas fa-layer-group text-sm mr-2"></i>
                            Niveles
                            <i class="fas fa-angle-down text-sm ml-2"></i>
                        </button>
                        <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                            <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">Settings</a>
                            <div class="py-2">
                                <hr></hr>
                            </div>
                            <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">    
                                Logout
                            </a>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                @foreach ($courses as $course)
                    <article class="bg-white shadow-lg rounded overflow-hidden">
                        <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                        <div class="px-6 py-4">
                            <h1 class="text-xl text-gray-700 mb-2 leading-6">{{ Str::limit($course->title, 40) }}</h1>
                            <p class="text-gray-500 text-sm mb-2">Prof. {{ $course->teacher->name }}</p>
                            <div class="flex">
                                <ul class="flex text-sm">
                                    <li class="mr-1">
                                        <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                                    </li>
                                </ul>
                                <p class="text-sm text-gray-500 ml-auto">
                                    <i class="fas fa-users"></i>
                                    ({{ $course->students_count }})
                                </p>
                            </div>
                            <a href="{{ route('courses.show', $course) }}" class="block text-center w-full mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Mas información
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
                {{ $courses->links() }}
            </div>
        </div>
1. Modificar método **render** en **app\Http\Livewire\CourseIndex.php**
    >
        public function render()
        {
            $courses = Course::where('status', 3)->latest('id')->paginate(8);
            return view('livewire.course-index', compact('courses'));
        }
    Importar modelo **Course**:
    >
        use App\Models\Course;


### Viedo 16. Habilitar filtrado de cursos
1. Modificar el controlador **app\Http\Livewire\CourseIndex.php**
    >
        <?php

        namespace App\Http\Livewire;

        use App\Models\Category;
        use App\Models\Course;
        use App\Models\Level;
        use Livewire\Component;
        use Livewire\WithPagination;

        class CourseIndex extends Component
        {
            use WithPagination;
            
            public $category_id;
            public $level_id;

            public function render()
            {
                $categories = Category::all();
                $levels = Level::all();
                $courses = Course::where('status', 3)
                    ->category($this->category_id)
                    ->level($this->level_id)
                    ->latest('id')
                    ->paginate(8);
                return view('livewire.course-index', compact('courses', 'categories', 'levels'));
            }

            public function resetFilters(){
                $this->reset(['category_id','level_id']);
            }
        }
1. Modificar la vista **resources\views\livewire\course-index.blade.php**
    >
        <div>
            <div class="bg-gray-200 mb-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
                    <button class="focus:outline-none bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilters">
                        <i class="fas fa-archway text-xs mr-2"></i>
                        Todos los cursos
                    </button>
                    
                    <!-- Dropdown Categoria -->
                    <div class="relative mr-4" x-data="{ open: false }">
                        <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">
                            <i class="fas fa-tags text-sm mr-2"></i>
                            Categoria
                            <i class="fas fa-angle-down text-sm ml-2"></i>
                        </button>
                        <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">
                            @foreach ($categories as $category)
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('category_id',{{ $category->id }})" x-on:click="open = false">{{ $category->name }}</a>
                            @endforeach
                        </div> 
                    </div>
                    
                    <!-- Dropdown Niveles -->
                    <div class="relative" x-data="{ open: false }">
                        <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">
                            <i class="fas fa-layer-group text-sm mr-2"></i>
                            Niveles
                            <i class="fas fa-angle-down text-sm ml-2"></i>
                        </button>
                        <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">
                            @foreach ($levels as $level)
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('level_id',{{ $level->id }})" x-on:click="open = false">{{ $level->name }}</a>
                            @endforeach
                        </div> 
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                @foreach ($courses as $course)
                    <x-course-card :course="$course"/>
                @endforeach
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
                {{ $courses->links() }}
            </div>
        </div>
1. Agregar métodos query scopes en el modelo **Course** ():
    >
        // Query scope Category
        public function scopeCategory($query, $category_id){
            if($category_id){
                return $query->where('category_id', $category_id);
            }
        }

        // Query scope Level
        public function scopeLevel($query, $level_id){
            if($level_id){
                return $query->where('level_id', $level_id);
            }
        }
1. Crear componente de Blade para los cursos:
    + resources\views\components\course-card.blade.php
    >
        @props(['course'])

        <article class="bg-white shadow-lg rounded overflow-hidden">
            <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
            <div class="px-6 py-4">
                <h1 class="text-xl text-gray-700 mb-2 leading-6">{{ Str::limit($course->title, 40) }}</h1>
                <p class="text-gray-500 text-sm mb-2">Prof. {{ $course->teacher->name }}</p>
                <div class="flex">
                    <ul class="flex text-sm">
                        <li class="mr-1">
                            <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li class="mr-1">
                            <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li class="mr-1">
                            <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li class="mr-1">
                            <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li class="mr-1">
                            <i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                    </ul>
                    <p class="text-sm text-gray-500 ml-auto">
                        <i class="fas fa-users"></i>
                        ({{ $course->students_count }})
                    </p>
                </div>
                <a href="{{ route('courses.show', $course) }}" class="block text-center w-full mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Mas información
                </a>
            </div>
        </article>
1. Modificar vista **welcome** (resources\views\welcome.blade.php) para reemplazar la llamada de los cursos por un componente:
    >
        <x-app-layout>
            ≡
            <section class="my-24">
                <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>
                <p class="text-center text-gray-500 text-sm mb-6">Trabajo duro para seguir subiendo cursos</p>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                    @foreach ($courses as $course)
                        <x-course-card :course="$course"/>
                    @endforeach
                </div>
            </section>
        </x-app-layout>


### Viedo 17. Crear clases de estilos personalizadas
1. Deshabilitar la clase container de tailwind en **tailwind.config.js**:
    >
        ≡
        module.exports = {
            ≡
            
            corePlugins: {
                // ...
            container: false,
            },

            plugins: [require('@tailwindcss/ui')],
        };
1. Crear archivo de **estilos resources\css\commom.css**
    >
        .container{
            @apply max-w-7xl mx-auto px-4;
        }

        .card{
            @apply bg-white shadow-lg rounded overflow-hidden;
        }

        .card-body{
            @apply px-6 py-4;
        }

        .card-title{
            @apply text-xl text-gray-700 mb-2 leading-6;
        }

        @media(min-width:640px){
            .container{
                @apply px-6;
            }
        }

        @media(min-width:1024px){
            .container{
                @apply px-8;
            }
        }
    ##### https://tailwindcss.com/docs/container
1. Importar **resources\css\commom.css** en **resources\css\app.css**:
    >
        ≡
        @import 'commom.css';
1. Compilar los nuevos estilos:
    >
        $ npm run watch
    En caso de error:
    >
        $ npm uninstall cross-env (Luego borrar el directorio node_modules)
        $ npm install --global cross-env
        $ npm install --no-bin-links
        $ npm audit fix --force
        $ npm install
        $ npm run watch
    Otra posible solución:
    >
        Eliminar direcotorio node_modules
        Eliminar package-lock.json
        $ npm cache clear --force
        $ npm install cross-env
        $ npm install
        $ npm run dev
1. En la plantilla **resources\views\navigation-dropdown.blade.php**:
    Cambiars:
    >
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
    Por:
    >
        class="container"

1. En la vista **resources\views\components\course-card.blade.php**:
    Cambiar las clases:
    >
        class="bg-white shadow-lg rounded overflow-hidden"
        class="px-6 py-4"
        class="text-xl text-gray-700 mb-2 leading-6"
    Por las clases respectivamente:
    >
        class="card"
        class="card-body"
        class="card-title"
1. Crear archivo de **resources\css\buttons.css**
    >
        .btn {
            @apply font-bold py-2 px-4 rounded;
        }

        .btn-block{
            @apply block text-center w-full;
        }

        .btn-primary {
            @apply bg-blue-500 text-white;
        }

        .btn-primary:hover {
            @apply bg-blue-700;
        }

        .btn-danger {
            @apply bg-red-500 text-white;
        }

        .btn-danger:hover {
            @apply bg-red-700;
        }
    ##### https://v1.tailwindcss.com/components/buttons
1. Importar **resources\css\buttons.css** en **resources\css\app.css**:
    >
        ≡
        @import 'buttons.css';
1. En la vista **resources\views\components\course-card.blade.php**:
    Reemplazar los textos:
    + bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded
    + block text-center w-full
    Por estos otros respectivamente:
    + btn btn-primary
    + btn-block


### Viedo 18. Diseñando la vista show de cursos
1. Modificar la ruta **courses.show** en **routes\web.php**:
    >
        Route::get('cursos/{course}', [CourseController::class, 'show'])->name('courses.show');
1. Generar el método show en **app\Http\Controllers\CourseController.php**:
    >
        public function show(Course $course){
            $similares = Course::where('category_id', $course->category_id)
                            ->where('id','!=',$course->id)
                            ->where('status', 3)
                            ->latest('id')
                            ->take(5)
                            ->get();
            return view('courses.show',compact('course', 'similares'));
        }
    Importar al modelo Course:
    >
        use App\Models\Course;
1. Crear vista **resources\views\courses\show.blade.php**:
    >
        <x-app-layout>
            <section class="bg-gray-700 py-12 mb-12">
                <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <figure>
                        <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url )}}" alt="">
                    </figure>
                    <div class="text-white">
                        <h1 class="text-4xl">{{ $course->title }}</h1>
                        <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                        <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{ $course->level->name }}</p>
                        <p class="mb-2"><i class=""></i> Categoría: {{ $course->category->name }}</p>
                        <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{ $course->students_count }}</p>
                        <p><i class="far fa-star"></i> Calificación: {{ $course->rating }}</p>
                    </div>
                </div>
            </section>

            <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="order-2 lg:col-span-2 lg:order-1">
                    <section class="card mb-12">
                        <div class="card-body">
                            <h1 class="font-bold text-2xl mb-2">Lo que aprenderás</h1>
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                                @foreach ($course->goals as $goal)
                                    <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i> {{ $goal->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                    <section class="mb-12">
                        <h1 class="font-bold text-3xl mb-2">Temario</h1>
                        @foreach ($course->sections as $section)
                            <article class="mb-4 shadow" 
                            @if ($loop->first)
                            x-data="{ open: true }"
                            @else
                            x-data="{ open: false }"    
                            @endif>
                                <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open = !open">
                                    <h1 class="font-bold text-lg text-gray-600">{{ $section->name }}</h1>
                                </header>
                                <div class="bg-white py-2 px-4" x-show="open">
                                    <ul class="grid grid-cols-1 gap-2">
                                        @foreach ($section->lessons as $lesson)
                                            <li class="text-gray-700 text-base"><i class="fas fa-play-circle mr-2 text-gray-600"></i> {{ $lesson->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                    </section>
                    <section>
                        <h1 class="font-bold text-3xl">Requisitos</h1>
                        <ul class="list-disc list-inside">
                            @foreach ($course->requirements as $requirement)
                                <li class="text-gray-700">{{ $requirement->name }}</li>
                            @endforeach
                        </ul>
                    </section>
                    <section>
                        <h1 class="font-bold text-3xl">Descripción</h1>
                        <div class="text-gray-700 text-base">
                            {{ $course->description }}
                        </div>
                    </section>
                </div>
                <div class="order-1 lg:order-2">
                    <section class="card mb-4">
                        <div class="card-body">
                            <div class="flex items-center">
                                <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                                <div class="ml-4">
                                    <h1 class="font-bold text-gray-500 text-lg">Prof. {{ $course->teacher->name }}</h1>
                                    <a class="text-blue-400 text-sm font-bold" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                                </div>
                            </div>
                            <a href="" class="btn btn-danger btn-block mt-4">Llevar este curso</a>
                        </div>
                    </section>
                    <aside class="hidden lg:block">
                        @foreach ($similares as $similar)
                            <article class="flex mb-6">
                                <img class="h-32 w-40 object-cover" src="{{ Storage::url($similar->image->url) }}" alt="">
                                <div class="ml-3">
                                    <h1>
                                        <a class="font-bold text-gray-500 mb-3" href="{{ route('courses.show', $similar) }}">{{ Str::limit($similar->title, 40) }}</a>
                                    </h1>
                                    <div class="flex items-center mb-2">
                                        <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{ $similar->teacher->profile_photo_url }}" alt="">
                                        <p class="text-gray-700 text-sm ml-2">{{ $similar->teacher->name  }}</p>
                                    </div>
                                    <p class="text-sm"><i class="fas fa-star mr-2 text-yellow-400"></i>{{ $similar->rating }}</p>
                                </div>
                            </article>
                        @endforeach
                    </aside>
                </div>
            </div>
        </x-app-layout>
1. En la plantilla **resources\views\navigation-dropdown.blade.php**
    Cambiar:
    + 'active' => request()->routeIs('courses.index')
    Por:
    + 'active' => request()->routeIs('courses.*')


### Viedo 19. Habilitar matricula de alumnos
1. Crear ruta para matrícular usuario en **routes\web.php**:
    >
        Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');
1. Crear método **enrolled** en el controlador **app\Http\Controllers\CourseController.php**:
    >
        public function enrolled(Course $course){
            // Agrega un registro a la tabla intermedia course_user
            $course->students()->attach(auth()->user()->id);
            return redirect()->route('courses.status', $course);
        }
1. En la vista **resources\views\courses\show.blade.php**:
    Reemplazar:
    >
        <a href="" class="btn btn-danger btn-block mt-4">Llevar este curso</a>
    Por:
    >
        @can('enrolled', $course)
            <a class="btn btn-danger btn-block mt-4" href="{{ route('courses.status', $course) }}">Continuar con curso</a>
        @else
            <form action="{{ route('courses.enrolled', $course) }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-block mt-4" type="submit">Llevar este curso</button>
            </form>
        @endcan
1. Crear ruta para el control de avance del usuario en **routes\web.php**:
    >
        Route::get('course-status/{course}', function ($course) {
            return "Aquí vas a poder llevar el control de tu avence";
        })->name('courses.status');
1. Crear políticas de acceso a llevar curso o continuar curso:
    >
        $ php artisan make:policy CoursePolicy   
1. Crear método **enrolled** a la política **app\Policies\CoursePolicy.php**:
    >
        public function enrolled(User $user, Course $course){
            return $course->students->contains($user->id);
        }
    Importar el modelo **Course**:
    >
        use App\Models\Course;


### Viedo 20. Habilitar el buscador de cursos
1. Crear componente **Search**:
    >
        $ php artisan make:livewire Search
1. En la vista **resources\views\welcome.blade.php**:
    Reemplazar:
    >
        <div class="pt-2 relative mx-auto text-gray-600">
            <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
            type="search" name="search" placeholder="Search">
            <!-- extraido de https://v1.tailwindcss.com/components/buttons -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                Buscar
            </button>
        </div>
    Por:
    >
        @livewire('search')
1. Diseñar vista del componente **Search** en **resources\views\livewire\search.blade.php**:
    >
        <form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
            <input wire:model="search" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
            type="search" name="search" placeholder="Search">
            <!-- extraido de https://v1.tailwindcss.com/components/buttons -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                Buscar
            </button>
            <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden">
                @if ($search)
                    @forelse ($this->results as $result)
                        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                            <a href="{{ route('courses.show', $result) }}">{{ $result->title }}</a>
                        </li>
                    @empty
                        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                            No hay ninguna coincidencia :(
                        </li>
                    @endforelse
                @endif
            </ul>
        </form>
1. Programar el controlador del componente **Search** en **app\Http\Livewire\Search.php**:
    >
        <?php

        namespace App\Http\Livewire;

        use App\Models\Course;
        use Livewire\Component;

        class Search extends Component
        {
            public $search;

            public function render()
            {
                return view('livewire.search');
            }

            // Esta función es una propiedad computada: get[Results]Property
            // Se le invoca desde la vista como $this->results
            public function getResultsProperty(){
                return Course::where('title', 'LIKE', '%' . $this->search . '%')
                        ->where('status',3)
                        ->take(8)
                        ->get();
            }
        }
1. En la vista
    Reemplazar:
    >
        <div class="pt-2 relative mx-auto text-gray-600">
            <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
            type="search" name="search" placeholder="Search">
            <!-- extraido de https://v1.tailwindcss.com/components/buttons -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                Buscar
            </button>
        </div>
    Por:
    >
        @livewire('search')


## Sección 4: Control del avance del curso


### Viedo 21. Componente Livewire de vista completa
1. Modificar la ruta **courses.status** en **routes\web.php**:
    >
        Route::get('course-status/{course}', [CourseController::class, 'status'])->name('courses.status');
1. Generar el método **status** en el controlador **app\Http\Controllers\CourseController.php**:
    >
        public function status(Course $course){
            return view('courses.status', compact('course'));
        }
1. Crear vista **resources\views\courses\status.blade.php**:
    >
        <x-app-layout>
            @livewire('course-status')
        </x-app-layout>
1. Crear componente para el status de cursos:
    >
        $ php artisan make:livewire CourseStatus
1. Diseñar vista **resources\views\livewire\course-status.blade.php**:
    >
        <div>
            <h1>{{ $course->title }}</h1>
        </div>
1. En el archivo de rutas **routes\web.php**:
    Importar el componente:
    >
        use App\Http\Livewire\CourseStatus;
    Modificar ruta **courses.status**:
    >
        Route::get('course-status/{course}', CourseStatus::class)->name('courses.status');
1. Eliminar método **status** en el controlador **app\Http\Controllers\CourseController.php**.
1. Eliminar vista **resources\views\courses\status.blade.php**.
1. Programar controlador del componente **CourseStatus** **app\Http\Livewire\CourseStatus.php**:
    >
        <?php

        namespace App\Http\Livewire;

        use App\Models\Course;
        use Livewire\Component;

        class CourseStatus extends Component
        {
            public $course;

            // atrapa el slug del curso en la url (el método debe llamarse mount)
            public function mount(Course $course){
                $this->course = $course;
            }

            public function render()
            {
                return view('livewire.course-status');
            }
        }


### Viedo 22. Recuperando información que se va a mostrar
1. Modificar la vista **resources\views\livewire\course-status.blade.php**:
    >
        <div class="mt-8">
            <div class="container grid grid-cols-3 gap-8">
                <div class="col-span-2">
                    {!! $current->iframe !!}
                    {{ $current->name }}
                </div>
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $course->title }}</h1>
                        <div class="flex items-center">
                            <figure>
                                <img src="{{ $course->teacher->profile_photo_url }}" alt="">
                            </figure>
                            <div>
                                <p>{{ $course->teacher->name }}</p>
                                <a class="text-blue-500" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                            </div>
                        </div>
                        <ul>
                            @foreach ($course->sections as $section)
                                <li>
                                    <a class="font-bold">{{ $section->name }}</a>
                                    <ul>
                                        @foreach ($section->lessons as $lesson)
                                            <li>
                                                <a href="">{{ $lesson->id }}
                                                    @if ($lesson->completed)
                                                        (Completado)
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
1. Agregar atributo para comprobar si una lección esta completada en el controlador **app\Models\Lesson.php**:
    >
        ≡
        class Lesson extends Model
        {
            use HasFactory;

            protected $guarded = ['id'];

            // Esta función es un atributo: get[Completed]Attribute
            // Comprueba si una lección esta completada
            public function getCompletedAttribute(){
                // Para traernos el registro del usuario autentificado
                return $this->users->contains(auth()->user()->id);
            }
            ≡
1. Modificar controlador **app\Http\Livewire\CourseStatus.php**:
    >
        <?php

        namespace App\Http\Livewire;

        use App\Models\Course;
        use Livewire\Component;

        class CourseStatus extends Component
        {
            public $course;
            public $current;

            // atrapa el slug del curso en la url (el método debe llamarse mount)
            public function mount(Course $course){
                $this->course = $course;
                foreach($course->lessons as $lesson){
                    if(!$lesson->completed){
                        $this->current = $lesson;
                        break;
                    }
                }
            }

            public function render()
            {
                return view('livewire.course-status');
            }
        }    


### Viedo 23. Habilitar botones next y previous
1. Modificar controlador **app\Http\Livewire\CourseStatus.php**:
    >
        <?php

        namespace App\Http\Livewire;

        use App\Models\Course;
        use App\Models\Lesson;
        use Livewire\Component;

        class CourseStatus extends Component
        {
            public $course, $current;

            // atrapa el slug del curso en la url (el método debe llamarse mount)
            public function mount(Course $course){
                $this->course = $course;
                foreach($course->lessons as $lesson){
                    if(!$lesson->completed){
                        $this->current = $lesson;
                        break;
                    }
                }
            }

            public function render()
            {
                return view('livewire.course-status');
            }

            public function changeLesson(Lesson $lesson){
                $this->current = $lesson;
            }

            // Propiedad computada para index
            public function getIndexProperty(){
                return $this->course->lessons->pluck('id')->search($this->current->id);
            }

            // Propiedad computada para previous
            public function getPreviousProperty(){
                if($this->index == 0){
                    return null;
                }else{
                    return $this->course->lessons[$this->index - 1];
                }
            }

            // Propiedad computada para next
            public function getNextProperty(){
                if($this->index == $this->course->lessons->count() - 1){
                    return null;
                }else{
                    return $this->course->lessons[$this->index + 1];
                }
            }   
        }
1. Modificar vista **resources\views\livewire\course-status.blade.php**:
    >
        <div class="mt-8">
            <div class="container grid grid-cols-3 gap-8">
                <div class="col-span-2">
                    {!! $current->iframe !!}
                    {{ $current->name }}
                    <p>Indice: {{ $this->index }}</p>
                    <p>Previous: 
                        @if ($this->previous)
                            {{ $this->previous->id }}
                        @endif   
                    </p>
                    <p>Next: 
                        @if ($this->next)
                            {{ $this->next->id }}
                        @endif
                    </p>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $course->title }}</h1>
                        <div class="flex items-center">
                            <figure>
                                <img src="{{ $course->teacher->profile_photo_url }}" alt="">
                            </figure>
                            <div>
                                <p>{{ $course->teacher->name }}</p>
                                <a class="text-blue-500" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                            </div>
                        </div>
                        <ul>
                            @foreach ($course->sections as $section)
                                <li>
                                    <a class="font-bold">{{ $section->name }}</a>
                                    <ul>
                                        @foreach ($section->lessons as $lesson)
                                            <li>
                                                <a class="cursor-pointer" wire:click="changeLesson({{ $lesson }})" >{{ $lesson->id }}
                                                    @if ($lesson->completed)
                                                        (Completado)
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>


### Viedo 24. Dar estilos a la página
1. Agregar estilos a **resources\css\commom.css**:
    >
        .embed-responsive{
            position: relative;
            overflow: hidden;
            padding-top: 56.25%;
        }

        .embed-responsive iframe{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }   
1. Compilar los estilos creados:
    >
        $ npm run dev
1. Modificar la vista **resources\views\livewire\course-status.blade.php**:
    >
        <div class="mt-8">
            <div class="container grid grid-cols-3 gap-8">
                <div class="col-span-2">
                    <div class="embed-responsive">
                        {!! $current->iframe !!}
                    </div>
                    <h1 class="text-3xl text-gray-600 font-bold mt-4">
                    {{ $current->name }} 
                    </h1>
                    @if ($current->description)
                        <div class="text-gray-600">
                            {{ $current->description->name }}
                        </div>
                    @endif

                    <div class="flex items-center mt-4 cursor-pointer">
                        <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                        <p class="text-sm ml-2">Marcar esta unidad como culminada</p>
                    </div>

                    <div class="card mt-2">
                        <div class="card-body flex text-gray-500 font-bold">
                            @if ($this->previous)
                                <a wire:click="changeLesson({{ $this->previous }})" class="cursor-pointer">Tema anterior</a>
                            @endif
                            @if ($this->next)
                                <a wire:click="changeLesson({{ $this->next }})" class="ml-auto cursor-pointer">Siguiente tema</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-2xl leading-8 text-center mb-4">{{ $course->title }}</h1>
                        <div class="flex items-center">
                            <figure>
                                <img class="h-12 w-12 object-cover rounded-full mr-4" src="{{ $course->teacher->profile_photo_url }}" alt="">
                            </figure>
                            <div>
                                <p>{{ $course->teacher->name }}</p>
                                <a class="text-blue-500 text-sm" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                            </div>
                        </div>

                        <p class="text-gray-600 text-sm mt-2">20% completado</p>
                        <div class="relative pt-1">
                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                                <div style="width:30%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                            </div>
                        </div>

                        <ul>
                            @foreach ($course->sections as $section)
                                <li class="text-gray-600 mb-4">
                                    <a class="font-bold text-base inline-block mb-2">{{ $section->name }}</a>
                                    <ul>
                                        @foreach ($section->lessons as $lesson)
                                            <li class="flex">
                                                <div>
                                                    @if ($lesson->completed)
                                                        @if ($current->id == $lesson->id)
                                                            <span class="inline-block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>
                                                        @else
                                                            <span class="inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                                                        @endif
                                                    @else
                                                        @if ($current->id == $lesson->id)
                                                            <span class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1"></span>
                                                        @else
                                                            <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                                        @endif
                                                    @endif
                                                </div>
                                                <a class="cursor-pointer" wire:click="changeLesson({{ $lesson }})" >{{ $lesson->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    La barra de progreso se tomó de:
        https://www.creative-tim.com/learning-lab/tailwind-starter-kit/documentation/css/progressbars


### Viedo 25. Marcar unidad como culminada
1. Modificar vista del componente **resources\views\livewire\course-status.blade.php**:
    >
        <div class="mt-8">
            <div class="container grid grid-cols1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="embed-responsive">
                        {!! $current->iframe !!}
                    </div>
                    <h1 class="text-3xl text-gray-600 font-bold mt-4">
                    {{ $current->name }} 
                    </h1>
                    @if ($current->description)
                        <div class="text-gray-600">
                            {{ $current->description->name }}
                        </div>
                    @endif

                    <div class="flex items-center mt-4 cursor-pointer" wire:click="completed">
                        @if ($current->completed)
                            <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                        @else
                            <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                        @endif
                        <p class="text-sm ml-2">Marcar esta unidad como culminada</p>
                    </div>

                    <div class="card mt-2">
                        <div class="card-body flex text-gray-500 font-bold">
                            @if ($this->previous)
                                <a wire:click="changeLesson({{ $this->previous }})" class="cursor-pointer">Tema anterior</a>
                            @endif
                            @if ($this->next)
                                <a wire:click="changeLesson({{ $this->next }})" class="ml-auto cursor-pointer">Siguiente tema</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-2xl leading-8 text-center mb-4">{{ $course->title }}</h1>
                        <div class="flex items-center">
                            <figure>
                                <img class="h-12 w-12 object-cover rounded-full mr-4" src="{{ $course->teacher->profile_photo_url }}" alt="">
                            </figure>
                            <div>
                                <p>{{ $course->teacher->name }}</p>
                                <a class="text-blue-500 text-sm" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                            </div>
                        </div>

                        <p class="text-gray-600 text-sm mt-2">{{ $this->advance . '%' }} completado</p>
                        <div class="relative pt-1">
                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                                <div style="width:{{ $this->advance . '%' }}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500"></div>
                            </div>
                        </div>

                        <ul>
                            @foreach ($course->sections as $section)
                                <li class="text-gray-600 mb-4">
                                    <a class="font-bold text-base inline-block mb-2">{{ $section->name }}</a>
                                    <ul>
                                        @foreach ($section->lessons as $lesson)
                                            <li class="flex">
                                                <div>
                                                    @if ($lesson->completed)
                                                        @if ($current->id == $lesson->id)
                                                            <span class="inline-block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>
                                                        @else
                                                            <span class="inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                                                        @endif
                                                    @else
                                                        @if ($current->id == $lesson->id)
                                                            <span class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1"></span>
                                                        @else
                                                            <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                                        @endif
                                                    @endif
                                                </div>
                                                <a class="cursor-pointer" wire:click="changeLesson({{ $lesson }})" >{{ $lesson->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
1. Modificar controlador del componente **app\Http\Livewire\CourseStatus.php**:
    >
        <?php

        namespace App\Http\Livewire;

        use App\Models\Course;
        use App\Models\Lesson;
        use Livewire\Component;

        class CourseStatus extends Component
        {
            public $course, $current;

            // atrapa el slug del curso en la url (el método debe llamarse mount)
            public function mount(Course $course){
                $this->course = $course;
                foreach($course->lessons as $lesson){
                    if(!$lesson->completed){
                        $this->current = $lesson;
                        break;
                    }
                }

                // En caso de que todas las lecciones esten completadas
                if(!$this->current){
                    $this->current = $course->lessons->last();
                }
            }

            public function render()
            {
                return view('livewire.course-status');
            }

            // MÉTODOS

            public function changeLesson(Lesson $lesson){
                $this->current = $lesson;
            }

            public function completed(){
                if($this->current->completed){
                    // Eliminar registro
                    $this->current->users()->detach(auth()->user()->id);
                }else{
                    // Agregar registro
                    $this->current->users()->attach(auth()->user()->id);
                }
                $this->current = Lesson::find($this->current->id);
                $this->course = Course::find($this->course->id);
            }

            // PROPIEDADES COMPUTADAS

            // Propiedad computada para index
            public function getIndexProperty(){
                return $this->course->lessons->pluck('id')->search($this->current->id);
            }

            // Propiedad computada para previous
            public function getPreviousProperty(){
                if($this->index == 0){
                    return null;
                }else{
                    return $this->course->lessons[$this->index - 1];
                }
            }

            // Propiedad computada para next
            public function getNextProperty(){
                if($this->index == $this->course->lessons->count() - 1){
                    return null;
                }else{
                    return $this->course->lessons[$this->index + 1];
                }
            }
            
            // Propiedad computada para advance
            public function getAdvanceProperty(){
                $i = 0;
                foreach ($this->course->lessons as $lesson) {
                    if($lesson->completed){
                        $i++;
                    }
                }
                $advance = ($i * 100)/($this->course->lessons->count());
                return round($advance, 2);
            }
        }


### Viedo 26. Proteger rutas
1. Modificar el controlador **app\Http\Livewire\CourseStatus.php**:
    >
        <?php

        namespace App\Http\Livewire;

        use App\Models\Course;
        use App\Models\Lesson;
        use Livewire\Component;
        use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

        class CourseStatus extends Component
        {
            use AuthorizesRequests;
            public $course, $current;

            // atrapa el slug del curso en la url (el método debe llamarse mount)
            public function mount(Course $course){
                $this->course = $course;
                foreach($course->lessons as $lesson){
                    if(!$lesson->completed){
                        $this->current = $lesson;
                        break;
                    }
                }

                // En caso de que todas las lecciones esten completadas
                if(!$this->current){
                    $this->current = $course->lessons->last();
                }

                // Verifica si el usuario tiene autorización para ingresar al curso
                $this->authorize('enrolled', $course);
            }
            ≡
        }
1. Modificar ruta **courses.status** en **routes\web.php**:
            
    >
        Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');
1. Crear método **published** en **app\Policies\CoursePolicy.php**:
    >
        public function published(?User $user, Course $course){
            if($course->status == 3){
                return true;
            }else{
                return false;
            }
        }
1. Modificar método **show** en **app\Http\Controllers\CourseController.php**:
    >
        public function show(Course $course){
            $this->authorize('published', $course);

            $similares = Course::where('category_id', $course->category_id)
                            ->where('id','!=',$course->id)
                            ->where('status', 3)
                            ->latest('id')
                            ->take(5)
                            ->get();
            return view('courses.show',compact('course', 'similares'));
        }


## Sección 5: Roles y permisos


### Video 27. Generar las rutas de acceso para los instructores
1. Crear archivo de rutas **routes\instructor.php**:
    >
        <?php

        use App\Http\Livewire\InstructorCourses;
        use Illuminate\Support\Facades\Route;

        Route::redirect('', 'instructor/courses');

        Route::get('courses', InstructorCourses::class)->name('courses.index');
1. Modificar método **boot** de la clase **RouteServiceProvider** en **app\Providers\RouteServiceProvider.php**:
    >
        public function boot()
        {
            $this->configureRateLimiting();

            $this->routes(function () {
                Route::prefix('api')
                    ->middleware('api')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/api.php'));

                Route::middleware('web')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/web.php'));

                Route::middleware('web', 'auth')
                    ->prefix('admin')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/admin.php'));

                Route::middleware('web', 'auth')
                    ->name('instructor.')
                    ->prefix('instructor')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/instructor.php'));
            });
        }
1. Crear componentes para cursos de instructores:
    >
        $ php artisan make:livewire instructor-courses
1. Modificar plantilla **resources\views\navigation-dropdown.blade.php**:
    >
        ≡
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">

                @auth   
        ≡
                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                Perfil
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('instructor.courses.index') }}">
                                Instructor
                            </x-jet-dropdown-link>
        ≡
        <!-- Responsive Settings Options -->
        @auth

            <div class="pt-4 pb-1 border-t border-gray-200">
        ≡
                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        Perfil
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('instructor.courses.index') }}" :active="request()->routeIs('instructor.courses.index')">
                        Instructor
                    </x-jet-responsive-nav-link>       
        ≡


### Video 28. Instalar Laravel Permission
###### https://spatie.be/docs/laravel-permission/v3/basic-usage/basic-usage
1. Instalar Laravel Permission (sistema de roles y persmisos):
    >
        $ composer require spatie/laravel-permission
1. Publicar las vistas de Laravel Permission:
    >
        $ php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
1. Ejecutar las migraciones:
    >
        $ php artisan migrate
1. Modificar modelo **User** en **app\Models\User.php**:
    Importar a la cabecera:
    >
        use Spatie\Permission\Traits\HasRoles;
    Indicar a la clase User que se usará la libreria anterior:
    >
        class User extends Authenticatable
        {
            use HasApiTokens;
            use HasFactory;
            use HasProfilePhoto;
            use Notifiable;
            use TwoFactorAuthenticatable;
            use HasRoles;  
            ≡


### Video 29. Agregar permisos y preparar entorno de trabajo
1. Ejecutar Tinker e ingresar permisos:
    >
        $ php artisan tinker
        >>> use Spatie\Permission\Models\Permission;
        >>> Permission::create(['name' => 'Crear cursos']);
        >>> Permission::create(['name' => 'Leer cursos']);
        >>> Permission::create(['name' => 'Actualizar cursos']);
        >>> Permission::create(['name' => 'Eliminar cursos']);
        >>> exit
1. Crear controlador para administrar roles:
    >
        $ php artisan make:controller Admin/RoleController -r
1. Importar el modelo Role de Laravel Permission en **app\Http\Controllers\Admin\RoleController.php**:
    >
        use Spatie\Permission\Models\Role;
1. Modificar el controlador Role en **app\Http\Controllers\Admin\RoleController.php**:
    >
        <?php

        namespace App\Http\Controllers\Admin;

        use App\Http\Controllers\Controller;
        use Illuminate\Http\Request;
        use Spatie\Permission\Models\Role;

        class RoleController extends Controller
        {
            /**
            * Display a listing of the resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function index()
            {
                return view('admin.roles.index');
            }

            /**
            * Show the form for creating a new resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function create()
            {
                return view('admin.roles.create');
            }

            /**
            * Store a newly created resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @return \Illuminate\Http\Response
            */
            public function store(Request $request)
            {
                //
            }

            /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function show(Role $role)
            {
                return view('admin.roles.show', compact('role'));
            }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit(Role $role)
            {
                return view('admin.roles.edit', compact('role'));
            }

            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function update(Request $request, Role $role)
            {
                //
            }

            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy(Role $role)
            {
                //
            }
        }
1. Crear vistas del CRUD Role:
    + **index.blade.php**:
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Coders Free</h1>
        @stop

        @section('content')
            <p>Welcome to this beautiful admin panel.</p>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
        @stop
    + **create.blade.php**:
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Coders Free</h1>
        @stop

        @section('content')
            <p>Welcome to this beautiful admin panel.</p>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
        @stop
    + **show.blade.php**:
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Coders Free</h1>
        @stop

        @section('content')
            <p>Welcome to this beautiful admin panel.</p>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
        @stop
    + **edit.blade.php**:
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Coders Free</h1>
        @stop

        @section('content')
            <p>Welcome to this beautiful admin panel.</p>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
        @stop
1. Generar ruta para el CRUD Role en **routes\admin.php**:
    >
        Route::get('', [HomeController::class, 'index'])->name('home');
1. Modificar **config\adminlte.php**:
    >
        <?php

        return [

            ≡

            'logo' => '<b>Coders</b>FREE',
            'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'logo_img_class' => 'brand-image img-circle elevation-3',
            'logo_img_xl' => null,
            'logo_img_xl_class' => 'brand-image-xs',
            'logo_img_alt' => 'AdminLTE',

            ≡

            'use_route_url' => false,

            'dashboard_url' => '/',

            'logout_url' => 'logout',

            'login_url' => 'login',

            'register_url' => 'register',

            'password_reset_url' => 'password/reset',

            'password_email_url' => 'password/email',

            'profile_url' => false,

            ≡

            'menu' => [
                [
                    'text' => 'search',
                    'search' => true,
                    'topnav' => true,
                ],
                [
                    'text' => 'blog',
                    'url'  => 'admin/blog',
                    'can'  => 'manage-blog',
                ],
                [
                    'text'        => 'Dashboard',
                    'route'         => 'admin.home',
                    'icon'        => 'fas fa-fw fa-tachometer-alt',
                ],
                [
                    'text'        => 'Lista de roles',
                    'route'         => 'admin.roles.index',
                    'icon'        => 'fas fa-fw fa-users-cog',
                ],
                ['header' => 'account_settings'],
                [
                    'text' => 'profile',
                    'url'  => 'admin/settings',
                    'icon' => 'fas fa-fw fa-user',
                ],
                ≡
            ],

            ≡
        ];
1. Darle nombre a la ruta raíz en **routes\admin.php**:
    >
        Route::get('', [HomeController::class, 'index'])->name('home');
1. Modificar método **boot** en **app\Providers\RouteServiceProvider.php**:
    >
        public function boot()
        {
            $this->configureRateLimiting();

            $this->routes(function () {
                ≡
                Route::middleware('web', 'auth')
                    ->name('admin.')
                    ->prefix('admin')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/admin.php'));
                ≡
            });
        }


### Video 30. Crear un CRUD para roles
###### https://hackerthemes.com/bootstrap-cheatsheet/
###### https://github.com/jeroennoten/Laravel-AdminLTE/wiki
1. Modificar el controlador **app\Http\Controllers\Admin\RoleController.php**:
    >
        <?php

        namespace App\Http\Controllers\Admin;

        use App\Http\Controllers\Controller;
        use Illuminate\Http\Request;
        use Spatie\Permission\Models\Role;
        use Spatie\Permission\Models\Permission;

        class RoleController extends Controller
        {
            /**
            * Display a listing of the resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function index()
            {
                $roles = Role::all();
                return view('admin.roles.index', compact('roles'));
            }

            /**
            * Show the form for creating a new resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function create()
            {
                $permissions = Permission::all();
                return view('admin.roles.create', compact('permissions'));
            }

            /**
            * Store a newly created resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @return \Illuminate\Http\Response
            */
            public function store(Request $request)
            {
                $request->validate([
                    'name' => 'required',
                    'permissions' => 'required'
                ]);
                
                $role = Role::create([
                    'name' => $request->name
                ]);

                $role->permissions()->attach($request->permissions);

                return redirect()->route('admin.roles.index')->with('info', 'El rol se creo satisfactoriamente');
            }

            /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function show(Role $role)
            {
                return view('admin.roles.show', compact('role'));
            }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit(Role $role)
            {
                $permissions = Permission::all();
                return view('admin.roles.edit', compact('role', 'permissions'));
            }

            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function update(Request $request, Role $role)
            {
                $request->validate([
                    'name' => 'required',
                    'permissions' => 'required'
                ]);

                $role->permissions()->sync($request->permissions);

                return redirect()->route('admin.roles.edit', $role);
            }

            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy(Role $role)
            {
                $role->delete();
                return redirect()->route('admin.roles.index')->with('info', 'El rol se eliminó con éxito');
            }
        }
1. Modificar vista **resources\views\admin\roles\index.blade.php**:
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Lista de roles</h1>
        @stop

        @section('content')
            @if (session('info'))
                <div class="alert alert-primary" role="alert">
                    <strong>¡Éxito!</strong> {{ session('info') }}
                    important alert message.
                </div>
                
            @endif

            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.roles.create') }}">Crear rol</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td width="10px">
                                        <a class="btn btn-secondary" href="{{ route('admin.roles.edit', $role) }}">Editar</a>
                                    </td>
                                    <td width="10px">
                                        <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No hay ningún rol registrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
        @stop
1. Publicar vista de AdminLTE:
    >
        $ php artisan adminlte:install --only=main_views
    #### En **resources\views\vendor\adminlte\page.blade.php** es de donde se extienden las plantillas.
1. Instalar Laravel Collective:
    >
        $ composer require laravelcollective/html
    ##### https://laravelcollective.com/docs/6.x/html
1. Modificar vista **resources\views\admin\roles\create.blade.php**:
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Crear nuevo rol</h1>
        @stop

        @section('content')
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.roles.store']) !!}
                        @include('admin.roles.partials.form')
                        {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
        @stop
1. Crear formulario para el rol como **resources\views\admin\roles\partials\form.blade.php**:
    >
        <div class="form-group">
            {!! Form::label('name', 'Nombre: ') !!}
            {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' :  ''), 'placeholder' => 'Escriba un nombre']) !!}
            @error('name')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <strong>Permisos</strong>
        @error('permissions')
            <br>
            <small class="text-danger">
                <strong>{{ $message }}</strong>
            </small>
            <br>
        @enderror
        @foreach ($permissions as $permission)
            <div>
                <label>
                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                    {{ $permission->name }}
                </label>
            </div>
        @endforeach
1. Modificar vista **resources\views\admin\roles\edit.blade.php**:
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Editar rol</h1>
        @stop

        @section('content')
            <div class="card">
                <div class="card-body">
                    {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
                        @include('admin.roles.partials.form')
                        {!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
        @stop


### Video 31. Crear un CRUD para usuarios
1. Modificar el método **update** del controlador **app\Http\Controllers\Admin\RoleController.php**:
    >
        public function update(Request $request, Role $role)
        {
            $request->validate([
                'name' => 'required',
                'permissions' => 'required'
            ]);

            $role->update([
                'name' => $request->name
            ]);

            $role->permissions()->sync($request->permissions);

            return redirect()->route('admin.roles.edit', $role);
        }
1. Modificar el archivo de configuración **config\adminlte.php**:
    >
        <?php

        return [
            ≡
            'menu' => [
                [
                    'text'      => 'search',
                    'search'    => true,
                    'topnav'    => true,
                ],
                [
                    'text' => 'blog',
                    'url'  => 'admin/blog',
                    'can'  => 'manage-blog',
                ],
                [
                    'text'  => 'Dashboard',
                    'route' => 'admin.home',
                    'icon'  => 'fas fa-fw fa-tachometer-alt',
                ],
                [
                    'text'      => 'Lista de roles',
                    'route'     => 'admin.roles.index',
                    'icon'      => 'fas fa-fw fa-users-cog',
                    'active'    => ['admin/roles*'],
                ],
                [
                    'text'      => 'Usuarios',
                    'route'     => 'admin.users.index',
                    'icon'      => 'fas fa-fw fa-users',
                    'active'    => ['admin/users*'],
                ],
                ≡
            ],
            ≡
            'livewire' => true,
        ];
1. Crear controlador **User** para CRUD de usuarios:
    >
        $ php artisan make:controller Admin\UserController -r
1. Programar el controlador **app\Http\Controllers\Admin\UserController.php**:
    >
        <?php

        namespace App\Http\Controllers\Admin;

        use App\Http\Controllers\Controller;
        use App\Models\User;
        use Illuminate\Http\Request;
        use Spatie\Permission\Models\Role;

        class UserController extends Controller
        {
            /**
            * Display a listing of the resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function index()
            {
                return view('admin.users.index');
            }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit(User $user)
            {
                $roles = Role::all();
                return view('admin.users.edit', compact('user', 'roles'));
            }

            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function update(Request $request, User $user)
            {
                $user->roles()->sync($request->roles);
                return redirect()->route('admin.users.edit', $user);
            }
        }
1. Crear las vistas para el CRUD **User**:
    **resources\views\admin\users\index.blade.php**:
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Lista de usuarios</h1>
        @stop

        @section('content')
            @livewire('admin-users')
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
        @stop
    **resources\views\admin\users\edit.blade.php**:
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Editar usuario</h1>
        @stop

        @section('content')
            <div class="card">
                <div class="card-body">
                    <h1 class="h5">Nombre:</h1>
                    <p class="form-control">{{ $user->name }}</p>
                    <h1 class="h5">Lista de roles</h1>
                    {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                        @foreach ($roles as $role)
                            <div>
                                <label>
                                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                        {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
        @stop
1. Crear ruta para el CRUD **User** en routes\admin.php:
    >
        Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');
    Importar controlador **User**:
    >
        use App\Http\Controllers\Admin\UserController;
1. Crear componente de livewire para administrar usuarios:
    >
        $ php artisan make:livewire admin-users
1. Programar controlador del componente **app\Http\Livewire\AdminUsers.php**:
    >
        <?php

        namespace App\Http\Livewire;

        use App\Models\User;
        use Livewire\Component;
        use Livewire\WithPagination;

        class AdminUsers extends Component
        {
            use WithPagination;

            protected $paginationTheme = "bootstrap";

            public $search;

            public function render()
            {
                $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                            ->paginate(8);
                return view('livewire.admin-users', compact('users'));
            }

            public function limpiar_page(){
                $this->reset('page');
            }
        }
1. Diseñar vista del componente **resources\views\livewire\admin-users.blade.php**:
    >
        <div>
            <div class="card">
                <div class="card-header">
                    <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nombre ...">
                </div>
                @if ($users->count())
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td width="10px">
                                            <a class="btn btn-primary" href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $users->links() }}
                    </div>
                @else
                    <div class="card-body">
                        <strong>No hay registros ...</strong>
                    </div>
                @endif
            </div>
        </div>


### Video 32. Restringir botones y rutas por permisos
1. Modificar plantilla **resources\views\navigation-dropdown.blade.php**:
    >
        ≡
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow">
            <!-- Primary Navigation Menu -->
            <div class="container">
                <div class="flex justify-between h-16">
                    ≡
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        @auth
                            <x-jet-dropdown align="right" width="48">
                                ≡
                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>
                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        Perfil
                                    </x-jet-dropdown-link>

                                    @can('Leer cursos')
                                        <x-jet-dropdown-link href="{{ route('instructor.courses.index') }}">
                                            Instructor
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @can('Ver dashboard')
                                        <x-jet-dropdown-link href="{{ route('admin.home') }}">
                                            Administrador
                                        </x-jet-dropdown-link>
                                    @endcan

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif
                                    ≡
                                </x-slot>
                            </x-jet-dropdown>
                        @else
                            ≡
                        @endauth
                    </div>

                    <!-- Hamburger -->
                    ≡
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                ≡
                <!-- Responsive Settings Options -->
                @auth
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        ≡

                        <div class="mt-3 space-y-1">
                            <!-- Account Management -->
                            <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                Perfil
                            </x-jet-responsive-nav-link>
                            
                            @can('Leer cursos')
                                <x-jet-responsive-nav-link href="{{ route('instructor.courses.index') }}" :active="request()->routeIs('instructor.courses.index')">
                                    Instructor
                                </x-jet-responsive-nav-link>
                            @endcan
                    
                            @can('Ver dashboard')
                                <x-jet-responsive-nav-link href="{{ route('admin.home') }}" :active="request()->routeIs('admin.home')">
                                    Administrador
                                </x-jet-responsive-nav-link>
                            @endcan

                            ≡
                        </div>
                    </div>
                @else
                    ≡
                @endauth
            </div>  
        </nav>
1. Modificar ruta **courses.index** en **routes\instructor.php**:
    >
        Route::get('courses', InstructorCourses::class)->middleware('can:Leer cursos')->name('courses.index');
1. Crear seeder para generar roles permisos:
    >
        $ php artisan make:seeder RoleSeeder
        $ php artisan make:seeder PermissionSeeder
1. Modificar seeder **database\seeders\PermissionSeeder.php**:
    >
        <?php

        namespace Database\Seeders;

        use Illuminate\Database\Seeder;
        use Spatie\Permission\Models\Permission;

        class PermissionSeeder extends Seeder
        {
            /**
            * Run the database seeds.
            *
            * @return void
            */
            public function run()
            {
                Permission::create(['name' => 'Crear cursos']);
                Permission::create(['name' => 'Leer cursos']);
                Permission::create(['name' => 'Actualizar cursos']);
                Permission::create(['name' => 'Eliminar cursos']);
                Permission::create(['name' => 'Ver dashboard']);
                Permission::create(['name' => 'Crear role']);
                Permission::create(['name' => 'Listar role']);
                Permission::create(['name' => 'Editar role']);
                Permission::create(['name' => 'Eliminar role']);
                Permission::create(['name' => 'Leer usuarios']);
                Permission::create(['name' => 'Editar usuarios']);
            }
        }
1. Modificar seeder **database\seeders\RoleSeeder.php**:
    >
        <?php

        namespace Database\Seeders;

        use Illuminate\Database\Seeder;
        use Spatie\Permission\Models\Role;

        class RoleSeeder extends Seeder
        {
            /**
            * Run the database seeds.
            *
            * @return void
            */
            public function run()
            {
                $role = Role::create(['name' => 'Admin']);
                $role->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]);

                $role = Role::create(['name' => 'Instructor']);
                $role->syncPermissions(['Crear cursos', 'Leer cursos', 'Actualizar cursos', 'Eliminar cursos']);
            }
        }
1. Incluir los seeder de permisos y roles en método **run** de **database\seeders\DatabaseSeeder.php**:
    >
        public function run()
        {
            Storage::deleteDirectory('cursos');
            Storage::makeDirectory('cursos');
            
            $this->call(PermissionSeeder::class);
            $this->call(RoleSeeder::class);

            $this->call(UserSeeder::class);
            $this->call(LevelSeeder::class);
            $this->call(CategorySeeder::class);
            $this->call(PriceSeeder::class);
            $this->call(PlatformSeeder::class);
            $this->call(CourseSeeder::class);
        }
1. Modificar el método **run** del seeder **database\seeders\UserSeeder.php**:
    >
        public function run()
        {
            $user = User::create([
                'name' => 'Pedro Jesús Bazó Canelón',
                'email' => 'bazo.pedro@gmail.com',
                'password' => bcrypt('12345678')
            ]);

            $user->assignRole('Admin');

            User::factory(99)->create();
        }  
1. Ejecutar:
    >
        $ php artisan migrate:fresh --seed
1. Modificar archivo de configuración **config\adminlte.php**:
    >
        ≡
        'menu' => [
            [
                'text'      => 'search',
                'search'    => true,
                'topnav'    => true,
            ],
            [
                'text' => 'blog',
                'url'  => 'admin/blog',
                'can'  => 'manage-blog',
            ],
            [
                'text'  => 'Dashboard',
                'route' => 'admin.home',
                'icon'  => 'fas fa-fw fa-tachometer-alt',
                'can'   => 'Ver dashboard'
            ],
            [
                'text'      => 'Lista de roles',
                'route'     => 'admin.roles.index',
                'icon'      => 'fas fa-fw fa-users-cog',
                'can'       => 'Listar role',
                'active'    => ['admin/roles*'],
            ],
            [
                'text'      => 'Usuarios',
                'route'     => 'admin.users.index',
                'icon'      => 'fas fa-fw fa-users',
                'can'       => 'Leer usuarios',
                'active'    => ['admin/users*'],
            ],
            ≡
1. Proteger ruta **home** en **routes\admin.php**:
    >
        Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');
1. Crear el método **__construct** en el controlador **app\Http\Controllers\Admin\RoleController.php** para proteger las rutas **roles**:
    >
        ≡
        class RoleController extends Controller
        {
            public function __construct(){
                $this->middleware('can:Listar roles')->only('index');
                $this->middleware('can:Crear role')->only('create', 'store');
                $this->middleware('can:Editar role')->only('edit', 'update');
                $this->middleware('can:Eliminar role')->only('destroy');
            }
            ≡
1. Crear el método **__construct** en el controlador **app\Http\Controllers\Admin\UserController.php** para proteger las rutas **users**:
    >
        ≡
        class UserController extends Controller
        {
            public function __construct(){
                $this->middleware('can:Leer usuarios')->only('index');
                $this->middleware('can:Editar usuarios')->only('edit', 'update');
            }
            ≡


## Sección 6: Instructores


### Video 33. Mostrar el listado de cursos de un instructor
1. Modificar el controlador **app\Http\Livewire\InstructorCourses.php**:
    >
        <?php

        namespace App\Http\Livewire;

        use App\Models\Course;
        use Livewire\Component;
        use Livewire\WithPagination;

        class InstructorCourses extends Component
        {
            use WithPagination;

            public $search;

            public function render()
            {
                $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
                                    ->where('user_id', auth()->user()->id)
                                    ->paginate(8);
                return view('livewire.instructor-courses', compact('courses'));
            }

            public function limpiar_page(){
                $this->reset('page');
            }
        }
1. Diseñar la vista **resources\views\livewire\instructor-courses.blade.php**:
    ##### https://tailwindui.com/preview
    >
        <div class="container py-8">
            <x-table-responsive>
                <div class="px-6 py-4">
                    <input wire:keydown="limpiar_page" wire:model="search" class="form-input w-full shadow-sm" placeholder="Ingrese el nombre de un curso ...">
                </div>
                @if ($courses->count())
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Matriculados
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Calificación
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="{{ Storage::url($course->image->url) }}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $course->title }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $course->category->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $course->students->count() }}</div>
                                        <div class="text-sm text-gray-500">Alumnos matriculados</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 flex items-center">
                                            {{ $course->rating }}
                                            <ul class="flex text-sm ml-2">
                                                <li class="mr-1">
                                                    <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                                                </li>
                                                <li class="mr-1">
                                                    <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                                                </li>
                                                <li class="mr-1">
                                                    <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                                                </li>
                                                <li class="mr-1">
                                                    <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                                                </li>
                                                <li class="mr-1">
                                                    <i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-sm text-gray-500">Valoración del curso</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @switch($course->status)
                                            @case(1)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Borrador
                                                </span>   
                                                @break
                                            @case(2)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Revisión
                                                </span>   
                                                @break
                                            @case(3)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Publicado
                                                </span>   
                                                @break
                                            @default        
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>  
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-6 py-4">
                        {{ $courses->links() }}
                    </div>
                @else
                    <div class="px-6 py-4">
                        No hay ningún registro coincidente
                    </div>
                @endif
            </x-table-responsive>
        </div>
1. Crear componente **resources\views\components\table-responsive.blade.php**:
    >
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        {{ $slot }}

                    </div>
                </div>
            </div>
        </div>


### Video 34. Reorganizar rutas
1. Modificar archivo de rutas **routes\instructor.php**:
    >
        <?php

        use App\Http\Controllers\Instructor\CourseController;
        use Illuminate\Support\Facades\Route;

        Route::redirect('', 'instructor/courses');

        Route::resource('courses', CourseController::class)->names('courses');
1. Crear controlador para administrar las rutas relacionadas con los cursos de los instructores:
    >
        $ php artisan make:controller Instructor\CourseController -r
1. Programar controlador **app\Http\Controllers\Instructor\CourseController.php**:
    >
        <?php

        namespace App\Http\Controllers\Instructor;

        use App\Http\Controllers\Controller;
        use App\Models\Course;
        use Illuminate\Http\Request;

        class CourseController extends Controller
        {
            /**
            * Display a listing of the resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function index()
            {
                return view('instructor.courses.index');
            }

            /**
            * Show the form for creating a new resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function create()
            {
                return view('instructor.courses.create');
            }

            /**
            * Store a newly created resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @return \Illuminate\Http\Response
            */
            public function store(Request $request)
            {
                //
            }

            /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function show(Course $course)
            {
                return view('instructor.courses.show', compact('course'));
            }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit(Course $course)
            {
                return view('instructor.courses.edit', compact('course'));
            }

            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function update(Request $request, Course $course)
            {
                //
            }

            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy(Course $course)
            {
                //
            }
        }
1. Crear las vistas para el controlador anterior:
    **resources\views\instructor\courses\index.blade.php**:
    >
        <x-app-layout>
            @livewire('instructor.courses-index')
        </x-app-layout>
    **resources\views\instructor\courses\create.blade.php**:
    >
        <x-app-layout></x-app-layout>
    **resources\views\instructor\courses\edit.blade.php**:
    >
        <x-app-layout></x-app-layout>
    **resources\views\instructor\courses\show.blade.php**:
    >
        <x-app-layout></x-app-layout>
1. Reubicar y cambiar nombre a componente controlador de livewire:
    De:
    >
        app\Http\Livewire\InstructorCourses.php
    A:
    >
        app\Http\Livewire\Instructor\CoursesIndex.php
1. Modificar el controlador del componente **app\Http\Livewire\Instructor\CoursesIndex.php**:
    >
        <?php

        namespace App\Http\Livewire\Instructor;

        use App\Models\Course;
        use Livewire\Component;
        use Livewire\WithPagination;

        class CoursesIndex extends Component
        {
            use WithPagination;

            public $search;

            public function render()
            {
                $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
                                    ->where('user_id', auth()->user()->id)
                                    ->paginate(8);
                return view('livewire.instructor.courses-index', compact('courses'));
            }

            public function limpiar_page(){
                $this->reset('page');
            }
        }
1. Reubicar y cambiar nombre a componente vista de livewire:
    De:
    >
        resources\views\livewire\instructor-courses.blade.php
    A:
    >
        resources\views\livewire\instructor\courses-index.blade.php
1. Cambiar nombre a componente controlador de livewire:
    De:
    >
        app\Http\Livewire\CourseIndex.php
    A:
    >
        app\Http\Livewire\CoursesIndex.php
1. Modificar controlador **app\Http\Livewire\CoursesIndex.php**:
    >
        <?php

        namespace App\Http\Livewire;

        use App\Models\Category;
        use App\Models\Course;
        use App\Models\Level;
        use Livewire\Component;
        use Livewire\WithPagination;

        class CoursesIndex extends Component
        {
            use WithPagination;
            
            public $category_id;
            public $level_id;

            public function render()
            {
                $categories = Category::all();
                $levels = Level::all();
                $courses = Course::where('status', 3)
                    ->category($this->category_id)
                    ->level($this->level_id)
                    ->latest('id')
                    ->paginate(8);
                return view('livewire.courses-index', compact('courses', 'categories', 'levels'));
            }

            public function resetFilters(){
                $this->reset(['category_id','level_id']);
            }
        }
1. Cambiar nombre a componente vista de livewire:
    De:
    >
        resources\views\livewire\course-index.blade.php
    A:
    >
        resources\views\livewire\courses-index.blade.php
1. Modificar vista **resources\views\courses\index.blade.php**:
    >
        <x-app-layout>
            <section class="bg-cover" style="background-image: url({{ asset('img/cursos/img_cursos.jpg') }})">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
                    <div class="w-full md:w-3/4 lg:w-1/2">
                        <h1 class="text-white font-bold text-4xl">Los mejores cursos de programación ¡GRATIS! y en español.</h1>
                        <p class="text-white text-lg mt-2 mb-4">Si estás buscando potenciar tus conocimientos de programación, has llegado al lugar adecuado. Encuentra cursos y proyectos que te ayudarán en ese proceso</p>
                        <!-- component extraido de https://tailwindcomponents.com/component/search-bar -->
                        @livewire('search')
                    </div>
                </div>
            </section>
            @livewire('courses-index')
        </x-app-layout>
1. Reubicar y cambiar nombre a componente controlador de livewire:
    De:
    >
        app\Http\Livewire\AdminUsers.php
    A:
    >
        app\Http\Livewire\Admin\UsersIndex.php
1. Modificar el controlador del componente **app\Http\Livewire\Admin\UsersIndex.php**:
    >
        <?php

        namespace App\Http\Livewire\Admin;

        use App\Models\User;
        use Livewire\Component;
        use Livewire\WithPagination;

        class UsersIndex extends Component
        {
            use WithPagination;

            protected $paginationTheme = "bootstrap";

            public $search;

            public function render()
            {
                $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                            ->paginate(8);
                return view('livewire.admin.users-index', compact('users'));
            }

            public function limpiar_page(){
                $this->reset('page');
            }
        }
1. Reubicar y cambiar nombre a componente vista de livewire:
    De:
    >
        resources\views\livewire\admin-users.blade.php
    A:
    >
        resources\views\livewire\admin\users-index.blade.php
1. Modificar vista **resources\views\admin\users\index.blade.php**:
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Lista de usuarios</h1>
        @stop

        @section('content')
            @livewire('admin.users-index')
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
        @stop


### Video 35. Formulario para actualizar información básica de curso
###### https://ckeditor.com/
###### https://ckeditor.com/ckeditor-5/download/
1. En resources\views\livewire\instructor\courses-index.blade.php:
    Cambiar:
    >
        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
    Por:
    >
        <a href="{{ route('instructor.courses.edit', $course) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
1. Diseñar la vista **resources\views\instructor\courses\edit.blade.php**:
    >
        <x-app-layout>
            <div class="container py-8 grid grid-cols-5">
                <aside>
                    <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
                    <ul class="text-sm text-gray-600">
                        <li class="leading-7 mb-1 border-l-4 border-indigo-400 pl-2">
                            <a href="">Información del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                            <a href="">Lecciones del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                            <a href="">Metas del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                            <a href="">Estudiantes</a>
                        </li>
                    </ul>
                </aside>
                <div class="col-span-4 card">
                    <div class="card-body text-gray-600">
                        <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
                        <hr class="mt-2 mb-6">
                        {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}
                            <div class="mb-4">
                                {!! Form::label('title', 'Título del curso') !!}
                                {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1']) !!}
                            </div>
                            <div class="mb-4">
                                {!! Form::label('slug', 'Slug del curso') !!}
                                {!! Form::text('slug', null, ['class' => 'form-input block w-full mt-1']) !!}
                            </div>
                            <div class="mb-4">
                                {!! Form::label('subtitle', 'Subtítulo del curso') !!}
                                {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1']) !!}
                            </div>
                            <div class="mb-4">
                                {!! Form::label('description', 'Descripción del curso') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1']) !!}
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    {!! Form::label('category_id', 'Categoría:') !!}
                                    {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1']) !!}
                                </div>
                                <div>
                                    {!! Form::label('level_id', 'Niveles:') !!}
                                    {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1']) !!}
                                </div>
                                <div>
                                    {!! Form::label('price_id', 'Precio:') !!}
                                    {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1']) !!}
                                </div>
                            </div>
                            <h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>
                            <div class="grid grid-cols-2 gap-4">
                                <figure>
                                    <img id="picture" class="w-full h-64 bg-cover bg-center" src="{{ Storage::url($course->image->url) }}" alt="">
                                </figure>
                                <div>
                                    <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate recusandae nesciunt nostrum, tenetur ducimus fugiat aspernatur beatae alias magni! Accusantium libero aspernatur rem minus quidem quo voluptatem praesentium esse voluptatibus.</p>
                                    {!! Form::file('file', ['class' => 'form-input w-full', 'id' => 'file']) !!}
                                </div>
                            </div>

                            <div class="flex justify-end">
                                {!! Form::submit('Actualizar información', ['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <x-slot name="js">
                <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
                <script>
                    //Slug automático
                    document.getElementById("title").addEventListener('keyup', slugChange);

                    function slugChange(){
                        
                        title = document.getElementById("title").value;
                        document.getElementById("slug").value = slug(title);

                    }

                    function slug (str) {
                        var $slug = '';
                        var trimmed = str.trim(str);
                        $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                        replace(/-+/g, '-').
                        replace(/^-|-$/g, '');
                        return $slug.toLowerCase();
                    }

                    //CKEDITOR
                    // Copiado de https://ckeditor.com/docs/ckeditor5/latest/builds/guides/integration/configuration.html
                    // Para habilitar todas las opciones: https://ckeditor.com/docs/ckeditor5/latest/builds/guides/quick-start.html
                    ClassicEditor
                        .create( document.querySelector( '#description' ), {
                            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
                            heading: {
                                options: [
                                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                                ]
                            }
                        } )
                        .catch( error => {
                            console.log( error );
                        } );

                    //Cambiar imagen
                    document.getElementById("file").addEventListener('change', cambiarImagen);

                    function cambiarImagen(event){
                        var file = event.target.files[0];

                        var reader = new FileReader();
                        reader.onload = (event) => {
                            document.getElementById("picture").setAttribute('src', event.target.result); 
                        };

                        reader.readAsDataURL(file);
                    }    
                </script>
            </x-slot>
        </x-app-layout>
1. Modificar la plantilla **resources\views\layouts\app.blade.php**:
    >
        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                ≡
            </head>
            <body class="font-sans antialiased">
                ≡

                @livewireScripts

                @isset($js)
                    {{ $js }}  
                @endisset
            </body>
        </html>
1. Modificar el controlador **app\Http\Controllers\Instructor\CourseController.php**:
    >
        <?php

        namespace App\Http\Controllers\Instructor;

        use App\Http\Controllers\Controller;
        use App\Models\Category;
        use App\Models\Course;
        use App\Models\Level;
        use App\Models\Price;
        use Illuminate\Http\Request;

        class CourseController extends Controller
        {
            /**
            * Display a listing of the resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function index()
            {
                return view('instructor.courses.index');
            }

            /**
            * Show the form for creating a new resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function create()
            {
                return view('instructor.courses.create');
            }

            /**
            * Store a newly created resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @return \Illuminate\Http\Response
            */
            public function store(Request $request)
            {
                //
            }

            /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function show(Course $course)
            {
                return view('instructor.courses.show', compact('course'));
            }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit(Course $course)
            {
                // de esta forma recuperamos una colección con todos los nombres de las categorias y
                // con el indice de las categorias a las que correponde
                $categories = Category::pluck('name', 'id');
                $levels = Level::pluck('name', 'id');
                $prices = Price::pluck('name', 'id');
                return view('instructor.courses.edit', compact('course','categories','levels','prices'));
            }

            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function update(Request $request, Course $course)
            {
                //
            }

            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy(Course $course)
            {
                //
            }
        }


### Video 36. Formulario para crear un nuevo curso
1. Modificar **resources\views\livewire\instructor\courses-index.blade.php**:
    >
        <div class="container py-8">
            <x-table-responsive>
                <div class="px-6 py-4 flex">
                    <input wire:keydown="limpiar_page" wire:model="search" class="form-input flex-1 shadow-sm" placeholder="Ingrese el nombre de un curso ...">
                    <a class="btn btn-danger ml-2" href="{{ route('instructor.courses.create') }}">Crear nuevo curso</a>
                </div>
                ≡
1. Modificar la vista **resources\views\instructor\courses\create.blade.php**:
    >
        <x-app-layout>
            <div class="container py-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-2xl font-bold">CREAR NUEVO CURSO</h1>
                        <hr class="mt-2 mb-6">
                        {!! Form::open(['route' => 'instructor.courses.store','files' => true, 'autocomplet' => 'off']) !!}
                            {!! Form::hidden('user_id', auth()->user()->id) !!}

                            @include('instructor.courses.partials.form')

                            <div class="flex justify-end">
                                {!! Form::submit('Crear curso', ['class' => 'btn btn-primary cursor-pointer']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <x-slot name="js">
                <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
                <script src="{{ asset('js\instructor\courses\form.js') }}"></script>
            </x-slot>
        </x-app-layout>
1. Crar vista **resources\views\instructor\courses\partials\form.blade.php**:
    >
        <div class="mb-4">
            {!! Form::label('title', 'Título del curso') !!}
            {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1']) !!}
        </div>
        <div class="mb-4">
            {!! Form::label('slug', 'Slug del curso') !!}
            {!! Form::text('slug', null, ['class' => 'form-input block w-full mt-1']) !!}
        </div>
        <div class="mb-4">
            {!! Form::label('subtitle', 'Subtítulo del curso') !!}
            {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1']) !!}
        </div>
        <div class="mb-4">
            {!! Form::label('description', 'Descripción del curso') !!}
            {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1']) !!}
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div>
                {!! Form::label('category_id', 'Categoría:') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1']) !!}
            </div>
            <div>
                {!! Form::label('level_id', 'Niveles:') !!}
                {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1']) !!}
            </div>
            <div>
                {!! Form::label('price_id', 'Precio:') !!}
                {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1']) !!}
            </div>
        </div>
        <h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>
        <div class="grid grid-cols-2 gap-4">
            <figure>
                @isset($course)
                    <img id="picture" class="w-full h-64 object-cover object-center" src="{{ Storage::url($course->image->url) }}" alt="">
                @else
                    <img id="picture" class="w-full h-64 object-cover object-center" src="https://images.pexels.com/photos/5940721/pexels-photo-5940721.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                @endisset
            </figure>
            <div>
                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate recusandae nesciunt nostrum, tenetur ducimus fugiat aspernatur beatae alias magni! Accusantium libero aspernatur rem minus quidem quo voluptatem praesentium esse voluptatibus.</p>
                {!! Form::file('file', ['class' => 'form-input w-full', 'id' => 'file']) !!}
            </div>
        </div>
    ##### Ir a https://www.pexels.com/es-es/buscar/course/ y copiar la dirección de una imagen
1. Modificar vista **resources\views\instructor\courses\edit.blade.php**:
    >
        <x-app-layout>
            <div class="container py-8 grid grid-cols-5">
                <aside>
                    <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
                    <ul class="text-sm text-gray-600">
                        <li class="leading-7 mb-1 border-l-4 border-indigo-400 pl-2">
                            <a href="">Información del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                            <a href="">Lecciones del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                            <a href="">Metas del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                            <a href="">Estudiantes</a>
                        </li>
                    </ul>
                </aside>
                <div class="col-span-4 card">
                    <div class="card-body text-gray-600">
                        <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
                        <hr class="mt-2 mb-6">
                        {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}

                            @include('instructor.courses.partials.form')

                            <div class="flex justify-end">
                                {!! Form::submit('Actualizar información', ['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <x-slot name="js">
                <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
                <script src="{{ asset('js\instructor\courses\form.js') }}"></script>
            </x-slot>
        </x-app-layout>
1. Modificar método **create** del controlador **app\Http\Controllers\Instructor\CourseController.php**:
    >
        public function create()
        {
            // de esta forma recuperamos una colección con todos los nombres de las categorias y
            // con el indice de las categorias a las que correponde
            $categories = Category::pluck('name', 'id');
            $levels = Level::pluck('name', 'id');
            $prices = Price::pluck('name', 'id');
            return view('instructor.courses.create', compact('categories','levels','prices'));
        }
1. Crear archivo js en **public\js\instructor\courses\form.js**:
    >
        //Slug automático
        document.getElementById("title").addEventListener('keyup', slugChange);

        function slugChange(){
            
            title = document.getElementById("title").value;
            document.getElementById("slug").value = slug(title);

        }

        function slug (str) {
            var $slug = '';
            var trimmed = str.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        }

        //CKEDITOR
        // Copiado de https://ckeditor.com/docs/ckeditor5/latest/builds/guides/integration/configuration.html
        // Para habilitar todas las opciones: https://ckeditor.com/docs/ckeditor5/latest/builds/guides/quick-start.html
        ClassicEditor
            .create( document.querySelector( '#description' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                }
            } )
            .catch( error => {
                console.log( error );
            } );

        //Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result); 
            };

            reader.readAsDataURL(file);
        }


### Video 37. Crear nuevo curso
1. Programar método **store** del controlador **app\Http\Controllers\Instructor\CourseController.php**:
    >
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'slug' => 'required|unique:courses',
                'subtitle' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'level_id' => 'required',
                'price_id' => 'required',
            ]);

            $course = Course::create($request->all());

            // Para saber si se ha enviado una imagen
            /* if($request->file('file')){
                return "Se está enviando una imagen";
            }else{
                return "No se está enviando una imagen";
            } */
            if($request->file('file')){
                $url = Storage::put('courses', $request->file('file'));
                $course->image()->create([
                    'url' => $url
                ]);
            }

            return redirect()->route('instructor.courses.edit', $course);
        }
    Importar Facades:
    >
        use Illuminate\Support\Facades\Storage;
1. Incluir los errores de validación en la vista **resources\views\instructor\courses\partials\form.blade.php**:
    >
        <div class="mb-4">
            {!! Form::label('title', 'Título del curso') !!}
            {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('title') ? ' border-red-600' : '')]) !!}
            @error('title')
                <strong class="text-xs text-red-600">{{ $message }}</strong>
            @enderror
        </div>
        <div class="mb-4">
            {!! Form::label('slug', 'Slug del curso') !!}
            {!! Form::text('slug', null, ['readonly' => 'readonly','class' => 'form-input block w-full mt-1' . ($errors->has('slug') ? ' border-red-600' : '')]) !!}
            @error('slug')
                <strong class="text-xs text-red-600">{{ $message }}</strong>
            @enderror
        </div>
        <div class="mb-4">
            {!! Form::label('subtitle', 'Subtítulo del curso') !!}
            {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}
            @error('subtitle')
                <strong class="text-xs text-red-600">{{ $message }}</strong>
            @enderror
        </div>
        <div class="mb-4">
            {!! Form::label('description', 'Descripción del curso') !!}
            {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('description') ? ' border-red-600' : '')]) !!}
            @error('description')
                <strong class="text-xs text-red-600">{{ $message }}</strong>
            @enderror
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div>
                {!! Form::label('category_id', 'Categoría:') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1']) !!}
            </div>
            <div>
                {!! Form::label('level_id', 'Niveles:') !!}
                {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1']) !!}
            </div>
            <div>
                {!! Form::label('price_id', 'Precio:') !!}
                {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1']) !!}
            </div>
        </div>
        <h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>
        <div class="grid grid-cols-2 gap-4">
            <figure>
                @isset($course->image)
                    <img id="picture" class="w-full h-64 object-cover object-center" src="{{ Storage::url($course->image->url) }}" alt="">
                @else
                    <img id="picture" class="w-full h-64 object-cover object-center" src="https://images.pexels.com/photos/5940721/pexels-photo-5940721.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                @endisset
            </figure>
            <div>
                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate recusandae nesciunt nostrum, tenetur ducimus fugiat aspernatur beatae alias magni! Accusantium libero aspernatur rem minus quidem quo voluptatem praesentium esse voluptatibus.</p>
                {!! Form::file('file', ['class' => 'form-input w-full', 'id' => 'file']) !!}
            </div>
        </div>
1. En **resources\views\livewire\instructor\courses-index.blade.php**:
    Reemplazar:
    >
        <img class="h-10 w-10 rounded-full" src="{{ Storage::url($course->image->url) }}" alt="">
    Por:
    >
        @isset($course->image)
            <img class="h-10 w-10 rounded-full object-cover object-center" src="{{ Storage::url($course->image->url) }}" alt="">
        @else
            <img class="h-10 w-10 rounded-full object-cover object-center" src="https://images.pexels.com/photos/5940721/pexels-photo-5940721.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">   
        @endisset       
1. En **app\Http\Livewire\Instructor\CoursesIndex.php**:
    Reemplazar:
    >
        $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
                            ->where('user_id', auth()->user()->id)
                            ->paginate(8);
    Por:
    >
        $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
                            ->where('user_id', auth()->user()->id)
                            ->latest('id')
                            ->paginate(8);
1. En **database\factories\ImageFactory.php**:
    Cambiar:
    >
        public function definition()
        {
            return [
                'url' => 'cursos/' . $this->faker->image('public/storage/cursos', 640, 480, null, false),
            ];
        }    
    Por:
    >
        public function definition()
        {
            return [
                'url' => 'courses/' . $this->faker->image('public/storage/courses', 640, 480, null, false),
            ];
        }
1. En **database\seeders\DatabaseSeeder.php**:
    Cambiar:
    >
        Storage::deleteDirectory('cursos');
        Storage::makeDirectory('cursos');
    Por:
    >
        Storage::deleteDirectory('courses');
        Storage::makeDirectory('courses');
1. Borrar el directorio **storage\app\public\cursos**.
1. Ejecutar:
    >
        $ php artisan migrate:fresh --seed


### Video 38. Actualizar información de curso
1. Programar método **update** del controlador **app\Http\Controllers\Instructor\CourseController.php**:
    >
        public function update(Request $request, Course $course)
        {
            $request->validate([
                'title' => 'required',
                'slug' => 'required|unique:courses,slug,' . $course->id,
                'subtitle' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'level_id' => 'required',
                'price_id' => 'required',
            ]);

            $course->update($request->all());

            // ¿Se esta enviando un archivo desde el formulario?
            if($request->file('file')){
                // Entonces guarda su dirección en $url y guarda la imagen en la carpeta course
                $url = Storage::put('courses', $request->file('file'));
                // ¿El curso tenia una imagen?
                if($course->image){
                    // Entonces borra la imagen anterior
                    Storage::delete($course->image->url);
                    // y actuliza la información del registro
                    $course->image->update([
                        'url' => $url
                    ]);
                }else{
                    // crea el registro de la url de la imagen del curso
                    $course->image->create([
                        'url' => $url
                    ]);
                }
            }

            return redirect()->route('instructor.courses.edit', $course);
        }


### Video 39. Agregar regla de validación para las imagenes
1. Modificar formulario **resources\views\instructor\courses\partials\form.blade.php**:
    Reemplazar:
    >
        {!! Form::file('file', ['class' => 'form-input w-full', 'id' => 'file']) !!}
    Por:
    >
        {!! Form::file('file', ['class' => 'form-input w-full'. ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
        @error('file')
            <strong class="text-xs text-red-600">{{ $message }}</strong>
        @enderror
1. Modificar reglas de validación en el controlador **app\Http\Controllers\Instructor\CourseController.php**:
    >
        ≡
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'slug' => 'required|unique:courses',
                'subtitle' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'level_id' => 'required',
                'price_id' => 'required',
                'file' => 'image'
            ]);
            ≡
        }
        ≡
        public function update(Request $request, Course $course)
        {
            $request->validate([
                'title' => 'required',
                'slug' => 'required|unique:courses,slug,' . $course->id,
                'subtitle' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'level_id' => 'required',
                'price_id' => 'required',
                'file' => 'image'
            ]);
            ≡
        }


### Video 40. Lo que desarrollaremos
###### Breve explicación de lo que haremos.


### Video 41. Crear nueva plantilla para instructores
1. Duplicar la vista **resources\views\layouts\app.blade.php** y renombrarla como **resources\views\layouts\instructor.blade.php**.
1. Rediseñar la nueva plantilla **resources\views\layouts\instructor.blade.php**:
    >
        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <title>{{ config('app.name', 'Laravel') }}</title>

                <!-- Fonts -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

                <!-- Styles -->
                <link rel="stylesheet" href="{{ mix('css/app.css') }}">
                <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

                @livewireStyles

                <!-- Scripts -->
                <script src="{{ mix('js/app.js') }}" defer></script>
            </head>
            <body class="font-sans antialiased">
                <div class="min-h-screen bg-gray-100">
                    @livewire('navigation-dropdown')

                    <!-- Page Content -->
                    <div class="container py-8 grid grid-cols-5">
                        <aside>
                            <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
                            <ul class="text-sm text-gray-600">
                                <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-400 @else border-transparent @endif pl-2">
                                    <a href="{{ route('instructor.courses.edit', $course) }}">Información del curso</a>
                                </li>
                                <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif pl-2">
                                    <a href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones del curso</a>
                                </li>
                                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                                    <a href="">Metas del curso</a>
                                </li>
                                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                                    <a href="">Estudiantes</a>
                                </li>
                            </ul>
                        </aside>
                        <div class="col-span-4 card">
                            <main class="card-body text-gray-600">
                                {{ $slot }}
                            </main>
                        </div>
                    </div>
                </div>

                @stack('modals')

                @livewireScripts

                @isset($js)
                    {{ $js }}  
                @endisset
            </body>
        </html>
1. Rediseñar la vista **resources\views\instructor\courses\edit.blade.php**:
    >
        <x-instructor-layout>
            <x-slot name="course">
                {{ $course->slug }}
            </x-slot>
            <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
            <hr class="mt-2 mb-6">
            {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}

                @include('instructor.courses.partials.form')

                <div class="flex justify-end">
                    {!! Form::submit('Actualizar información', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}

            <x-slot name="js">
                <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
                <script src="{{ asset('js\instructor\courses\form.js') }}"></script>
            </x-slot>
        </x-instructor-layout>
1. Crea componente de clase para extender la nueva plantilla **resources\views\layouts\instructor.blade.php**:
    >
        $ php artisan make:component InstructorLayout
1. Cambiar la vista del método render del controlador del nuevo componente en **app\View\Components\InstructorLayout.php**:
    Cambiar:
    + return view('components.instructor-layout');
    Por:
    + return view('layouts.instructor');
1. Eliminar la vista **resources\views\components\instructor-layout.blade.php**.
1. Modificar el archivo de rutas **routes\instructor.php**:
    >
        <?php

        use App\Http\Controllers\Instructor\CourseController;
        use App\Http\Livewire\Instructor\CoursesCurriculum;
        use Illuminate\Support\Facades\Route;

        Route::redirect('', 'instructor/courses');

        Route::resource('courses', CourseController::class)->names('courses');

        Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->name('courses.curriculum');
1. Para el control de la rutas **courses.curriculum** crearemos un componente de livewire:
    >
        $ php artisan make:livewire Instructor/CoursesCurriculum
1. Reprogramar el controlador **app\Http\Livewire\Instructor\CoursesCurriculum.php**:
    >
        <?php

        namespace App\Http\Livewire\Instructor;

        use App\Models\Course;
        use Livewire\Component;

        class CoursesCurriculum extends Component
        {
            public $course;

            public function mount(Course $course){
                $this->course = $course;
            }

            public function render()
            {
                // Le indicaremos que queremos utilizar una plantilla con la vista
                return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor');
            }
        }
1. Diseñar vista **resources\views\livewire\instructor\courses-curriculum.blade.php**:
    >
        <div>
            <x-slot name="course">
                {{ $course->slug }}
            </x-slot>
        </div>
1. Generar nuevas directivas de Blade modificando **app\Providers\AppServiceProvider.php**:
    >
        <?php

        namespace App\Providers;

        use Illuminate\Support\Facades\Blade;
        use Illuminate\Support\ServiceProvider;

        class AppServiceProvider extends ServiceProvider
        {
            /**
            * Register any application services.
            *
            * @return void
            */
            public function register()
            {
                //
            }

            /**
            * Bootstrap any application services.
            *
            * @return void
            */
            public function boot()
            {
                Blade::directive('routeIs', function ($expression) {
                    return "<?php if(Request::url() == route($expression)) : ?>";
                });
            }
        }


### Video 42. Agregar un crud para las secciones de un curso
1. Modificar vista **resources\views\livewire\instructor\courses-curriculum.blade.php**:
    >
        <div>
            <x-slot name="course">
                {{ $course->slug }}
            </x-slot>

            <h1 class="text-2xl font-bold">LECCIONES DEL CURSO</h1>
            <hr class="mt-2 mb-6">
            @foreach ($course->sections as $item)
                <article class="card mb-6">
                    <div class="card-body bg-gray-100">
                        @if ($section->id == $item->id)
                            <form wire:submit.prevent="update">
                                <input wire:model="section.name" type="text" class="form-input w-full" placeholder="Ingrese el nombre de la sección">
                                @error('section.name')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </form>
                        @else
                            <header class="flex justify-between items-center">
                                <h1 class="cursor-pointer"><strong>Sección:</strong> {{ $item->name }}</h1>
                                <div>
                                    <i class="fas fa-edit cursor-pointer text-blue-500" wire:click="edit({{ $item }})"></i>
                                    <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{ $item }})"></i>
                                </div>
                            </header>
                        @endif
                    </div>
                </article>
            @endforeach

            <div x-data="{ open: false }">
                <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
                    <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
                    Agregar nueva sección
                </a>
                <article class="card" x-show="open">
                    <div class="card-body bg-gray-100">
                        <h1 class="text-xl font-bold mb-4">Agregar nueva sección</h1>
                        <div class="mb-4">
                            <input wire:model="name" class="form-input w-full" placeholder="Escriba el nombre de la sección">
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                            <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
1. Modificar controlador **app\Http\Livewire\Instructor\CoursesCurriculum.php**:
    >
        <?php

        namespace App\Http\Livewire\Instructor;

        use App\Models\Course;
        use App\Models\Section;
        use Livewire\Component;

        class CoursesCurriculum extends Component
        {
            public $course, $section, $name;

            protected $rules = [
                'section.name' => 'required'
            ];

            public function mount(Course $course){
                $this->course = $course;
                $this->section = new Section();
            }

            public function render()
            {
                // Le indicaremos que queremos utilizar una plantilla con la vista
                return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor');
            }

            public function store(){
                $this->validate([
                    'name' => 'required'
                ]);
                Section::create([
                    'name' => $this->name,
                    'course_id' => $this->course->id
                ]);
                $this->reset('name');
                // Refresca la información de la vista
                $this->course = Course::find($this->course->id);
            }

            public function edit(Section $section){
                $this->section = $section;
            }

            public function update(){
                $this->validate();  // valida lo indicado en protected $rules = [..]
                $this->section->save();
                $this->section = new Section();
                // Refresca la información de la vista
                $this->course = Course::find($this->course->id);
            }

            public function destroy(Section $section){
                $section->delete();
                // Refresca la información de la vista
                $this->course = Course::find($this->course->id);
            }
        }


### Video 43. Agregar un crud para las lecciones de un curso
1. Crear componente livewire para lecciones:
    >
        $ php artisan make:livewire Instructor/CoursesLesson
1. Modificar vista **resources\views\livewire\instructor\courses-curriculum.blade.php** para llamar al nuevo componente:
    >
        <div>
            <x-slot name="course">
                {{ $course->slug }}
            </x-slot>

            <h1 class="text-2xl font-bold">LECCIONES DEL CURSO</h1>
            <hr class="mt-2 mb-6">
            @foreach ($course->sections as $item)
                <article class="card mb-6">
                    <div class="card-body bg-gray-100">
                        @if ($section->id == $item->id)
                            <form wire:submit.prevent="update">
                                <input wire:model="section.name" type="text" class="form-input w-full" placeholder="Ingrese el nombre de la sección">
                                @error('section.name')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </form>
                        @else
                            <header class="flex justify-between items-center">
                                <h1 class="cursor-pointer"><strong>Sección:</strong> {{ $item->name }}</h1>
                                <div>
                                    <i class="fas fa-edit cursor-pointer text-blue-500" wire:click="edit({{ $item }})"></i>
                                    <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{ $item }})"></i>
                                </div>
                            </header>
                            <div>
                                @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
                            </div>
                        @endif
                    </div>
                </article>
            @endforeach

            <div x-data="{ open: false }">
                <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
                    <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
                    Agregar nueva sección
                </a>
                <article class="card" x-show="open">
                    <div class="card-body bg-gray-100">
                        <h1 class="text-xl font-bold mb-4">Agregar nueva sección</h1>
                        <div class="mb-4">
                            <input wire:model="name" class="form-input w-full" placeholder="Escriba el nombre de la sección">
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                            <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
1. Programar el controlador **app\Http\Livewire\Instructor\CoursesLesson.php**:
    >
        <?php

        namespace App\Http\Livewire\Instructor;

        use App\Models\Lesson;
        use App\Models\Platform;
        use App\Models\Section;
        use Livewire\Component;

        class CoursesLesson extends Component
        {
            public $section, $lesson, $platforms, $name, $platform_id = 1, $url;

            protected $rules = [
                'lesson.name' => 'required',
                'lesson.platform_id' => 'required',
                //Validación youtube
                'lesson.url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x']
            ];

            public function mount(Section $section){
                $this->section = $section;
                $this->platforms = Platform::all();
                $this->lesson = new Lesson();
            }

            public function render()
            {
                return view('livewire.instructor.courses-lesson');
            }

            public function store(){
                $rules = [
                    'name' => 'required',
                    'platform_id' => 'required',
                    //Validación youtube
                    'url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x']
                ];

                if($this->platform_id == 2){
                    $rules['url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
                }

                $this->validate($rules);

                Lesson::create([
                    'name' => $this->name,
                    'platform_id' => $this->platform_id,
                    'url' => $this->url,
                    'section_id' => $this->section->id
                ]);

                $this->reset(['name', 'platform_id', 'url']);
                // Para actualizar la vista
                $this->section = Section::find($this->section->id);
            }

            public function edit(Lesson $lesson){
                $this->resetValidation();
                $this->lesson = $lesson;
            }

            public function update(){
                if($this->lesson->platform_id == 2){
                    $this->rules['lesson.url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
                }
                $this->validate();
                $this->lesson->save();
                $this->lesson = new Lesson();
                // Para actualizar la vista
                $this->section = Section::find($this->section->id);
            }

            public function destroy(Lesson $lesson){
                $lesson->delete();
                // Refresca la información de la vista
                $this->section = Section::find($this->section->id);
            }

            public function cancel(){
                $this->lesson = new Lesson();
            }
        }
1. Diseñar vista **resources\views\livewire\instructor\courses-lesson.blade.php**:
    >
        <div>
            @foreach ($section->lessons as $item)
                <article class="card mt-4">
                    <div class="card-body">
                        @if ($lesson->id == $item->id)
                            <div>
                                <div class="flex items-center">
                                    <label class="w-32">Nombre:</label>
                                    <input wire:model="lesson.name" class="form-input w-full">
                                </div>
                                @error('lesson.name')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror

                                <div class="flex items-center mt-4">
                                    <label class="w-32">Plataforma: </label>
                                    <select wire:model="lesson.platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($platforms as $platform)
                                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-center mt-4">
                                    <label class="w-32">URL:</label>
                                    <input wire:model="lesson.url" class="form-input w-full">
                                </div>
                                @error('lesson.url')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror

                                <div class="mt-4 flex justify-end">
                                    <button class="btn btn-danger" wire:click="cancel">Cancelar</button>
                                    <button class="btn btn-primary ml-2" wire:click="update">Actualizar</button>
                                </div>
                            </div>
                        @else
                            <header>
                                <h1><i class="far fa-play-circle text-blue-500 mr-1"></i> Lección: {{ $item->name }}</h1>
                            </header>
                            <div>
                                <hr class="my-2">
                                <p class="text-sm">Plataforma: {{ $item->platform->name }}</p>
                                <p class="text-sm">Enlace: <a class="text-blue-600" href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></p>
                                <div class="mt-2">
                                    <button class="btn btn-primary text-sm" wire:click="edit({{ $item }})">Editar</button>
                                    <button class="btn btn-danger text-sm" wire:click="destroy({{ $item }})">Eliminar</button>
                                </div>
                            </div>     
                        @endif
                    </div>
                </article>
            @endforeach

            <div class="mt-4" x-data="{ open: false }">
                <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
                    <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
                    Agregar nueva lección
                </a>
                <article class="card" x-show="open">
                    <div class="card-body">
                        <h1 class="text-xl font-bold mb-4">Agregar nueva lección</h1>
                        <div class="mb-4">
                            <div class="flex items-center">
                                <label class="w-32">Nombre:</label>
                                <input wire:model="name" class="form-input w-full">
                            </div>
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror

                            <div class="flex items-center mt-4">
                                <label class="w-32">Plataforma: </label>
                                <select wire:model="platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($platforms as $platform)
                                        <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('platform_id')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror

                            <div class="flex items-center mt-4">
                                <label class="w-32">URL:</label>
                                <input wire:model="url" class="form-input w-full">
                            </div>
                            @error('url')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                            <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
1. Crear observer para el modelo **Lesson**:
    >
        $ php artisan make:observer LessonObserver
1. Programar el observer **app\Observers\LessonObserver.php**:
    >
        <?php

        namespace App\Observers;

        use App\Models\Lesson;

        class LessonObserver
        {
            // Este método se ejecutará solo cuando creemos un nuevo registro en la tabla lessons
            public function creating(Lesson $lesson){
                $url = $lesson->url;
                $platform_id = $lesson->platform_id;

                if($platform_id == 1){
                    $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
                    $array = preg_match($patron, $url, $parte);
                    $lesson->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $parte[1] .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                }else{
                    $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
                    $array = preg_match($patron, $url, $parte);
                    $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
                }
            }

            // Este método se ejecutará solo cuando actualicemos algún registro de la tabla lessons
            public function updating(Lesson $lesson){
                $url = $lesson->url;
                $platform_id = $lesson->platform_id;

                if($platform_id == 1){
                    $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
                    $array = preg_match($patron, $url, $parte);
                    $lesson->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $parte[1] .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                }else{
                    $patron = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
                    $array = preg_match($patron, $url, $parte);
                    $lesson->iframe = '<iframe src="https://player.vimeo.com/video/' . $parte[2] . '" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
                }
            }
        }
1. Modificar el archivo **app\Providers\AppServiceProvider.php** para registrar el observer **LessonObserver**
    >
        <?php

        namespace App\Providers;

        use Illuminate\Support\Facades\Blade;
        use Illuminate\Support\ServiceProvider;
        use App\Models\Lesson;
        use App\Observers\LessonObserver;

        class AppServiceProvider extends ServiceProvider
        {
            /**
            * Register any application services.
            *
            * @return void
            */
            public function register()
            {
                //
            }

            /**
            * Bootstrap any application services.
            *
            * @return void
            */
            public function boot()
            {
                Lesson::observe(LessonObserver::class);
                Blade::directive('routeIs', function ($expression) {
                    return "<?php if(Request::url() == route($expression)) : ?>";
                });
            }
        }


### Video 44. Agregar descripción a una lección
1. Modificar vista **resources\views\livewire\instructor\courses-lesson.blade.php**:
    >
        <div>
            @foreach ($section->lessons as $item)
                <article class="card mt-4">
                    <div class="card-body">
                        @if ($lesson->id == $item->id)
                            <form wire:submit.prevent="update">
                                <div class="flex items-center">
                                    <label class="w-32">Nombre:</label>
                                    <input wire:model="lesson.name" class="form-input w-full">
                                </div>
                                @error('lesson.name')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror

                                <div class="flex items-center mt-4">
                                    <label class="w-32">Plataforma: </label>
                                    <select wire:model="lesson.platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($platforms as $platform)
                                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-center mt-4">
                                    <label class="w-32">URL:</label>
                                    <input wire:model="lesson.url" class="form-input w-full">
                                </div>
                                @error('lesson.url')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror

                                <div class="mt-4 flex justify-end">
                                    <button type="button" class="btn btn-danger" wire:click="cancel">Cancelar</button>
                                    <button type="submit" class="btn btn-primary ml-2">Actualizar</button>
                                </div>
                            </form>
                        @else
                            <header>
                                <h1><i class="far fa-play-circle text-blue-500 mr-1"></i> Lección: {{ $item->name }}</h1>
                            </header>
                            <div>
                                <hr class="my-2">
                                <p class="text-sm">Plataforma: {{ $item->platform->name }}</p>
                                <p class="text-sm">Enlace: <a class="text-blue-600" href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></p>
                                <div class="my-2">
                                    <button class="btn btn-primary text-sm" wire:click="edit({{ $item }})">Editar</button>
                                    <button class="btn btn-danger text-sm" wire:click="destroy({{ $item }})">Eliminar</button>
                                </div>

                                <div>
                                    @livewire('instructor.lesson-description', ['lesson' => $item], key($item->id))
                                </div>
                            </div>     
                        @endif
                    </div>
                </article>
            @endforeach

            <div class="mt-4" x-data="{ open: false }">
                <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
                    <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
                    Agregar nueva lección
                </a>
                <article class="card" x-show="open">
                    <div class="card-body">
                        <h1 class="text-xl font-bold mb-4">Agregar nueva lección</h1>
                        <div class="mb-4">
                            <div class="flex items-center">
                                <label class="w-32">Nombre:</label>
                                <input wire:model="name" class="form-input w-full">
                            </div>
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror

                            <div class="flex items-center mt-4">
                                <label class="w-32">Plataforma: </label>
                                <select wire:model="platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($platforms as $platform)
                                        <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('platform_id')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror

                            <div class="flex items-center mt-4">
                                <label class="w-32">URL:</label>
                                <input wire:model="url" class="form-input w-full">
                            </div>
                            @error('url')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                            <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
1. Crear componente de livewire:
    >
        $ php artisan make:livewire Instructor/LessonDescription
1. Programar el controlador del componente **app\Http\Livewire\Instructor\LessonDescription.php**:
    >
        <?php

        namespace App\Http\Livewire\Instructor;

        use App\Models\Lesson;
        use Livewire\Component;

        class LessonDescription extends Component
        {
            public $lesson, $description, $name;

            protected $rules = [
                'description.name' => 'required'
            ];

            public function mount(Lesson $lesson){
                $this->lesson = $lesson;
                if($lesson->description){
                    $this->description = $lesson->description;
                }
            }

            public function render()
            {
                return view('livewire.instructor.lesson-description');
            }

            public function store(){
                // Crea un nuevo registro en la tabla description y lo relaciona con el registro lesson
                $this->description = $this->lesson->description()->create([
                    'name' => $this->name
                ]);
                $this->reset('name');
                $this->lesson = Lesson::find($this->lesson->id);
            }

            public function update(){
                $this->validate();
                $this->description->save();
            }

            public function destroy(){
                $this->description->delete();
                $this->reset('description');
                $this->lesson = Lesson::find($this->lesson->id);
            }
        }
1. Diseñar la vista del componente **resources\views\livewire\instructor\lesson-description.blade.php**:
    >
        <div>
            <article class="card" x-data="{open: false}">
                <div class="card-body bg-gray-100">
                    <header>
                        <h1 x-on:click="open = !open" class="cursor-pointer">Descripción de la lección</h1>
                    </header>
                    <div x-show="open">
                        <hr class="my-2">
                        @if ($lesson->description)
                            <form wire:submit.prevent="update">
                                <textarea wire:model="description.name" class="form-input w-full"></textarea>
                                @error('description.name')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror

                                <div class="flex justify-end">
                                    <button wire:click="destroy" class="btn btn-danger text-sm" type="button">Eliminar</button>
                                    <button class="btn btn-primary text-sm ml-2" type="submit">Actualizar</button>
                                </div>
                            </form>
                        @else
                            <div>
                                <textarea wire:model="name" class="form-input w-full" placeholder="Agregue una descripción de la lección ..."></textarea>
                                @error('name')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror

                                <div class="flex justify-end">
                                    <button wire:click="store" class="btn btn-primary text-sm ml-2">Agregar</button>
                                </div>
                            <div>
                        @endif
                    </div>
                </div>
            </article>
        </div>


### Video 45. Agregar recursos a un lección
1. Crear componente livewire para los recursos de los cursos:
    >
        $ php artisan make:livewire Instructor/LessonResources
1. Modificar la vista **resources\views\livewire\instructor\courses-lesson.blade.php** para incluir el componente de recursos:
    >
        <div>
            @foreach ($section->lessons as $item)
                <article class="card mt-4" x-data="{open: false}">
                    <div class="card-body">
                        @if ($lesson->id == $item->id)
                            <form wire:submit.prevent="update">
                                <div class="flex items-center">
                                    <label class="w-32">Nombre:</label>
                                    <input wire:model="lesson.name" class="form-input w-full">
                                </div>
                                @error('lesson.name')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror

                                <div class="flex items-center mt-4">
                                    <label class="w-32">Plataforma: </label>
                                    <select wire:model="lesson.platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($platforms as $platform)
                                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex items-center mt-4">
                                    <label class="w-32">URL:</label>
                                    <input wire:model="lesson.url" class="form-input w-full">
                                </div>
                                @error('lesson.url')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror

                                <div class="mt-4 flex justify-end">
                                    <button type="button" class="btn btn-danger" wire:click="cancel">Cancelar</button>
                                    <button type="submit" class="btn btn-primary ml-2">Actualizar</button>
                                </div>
                            </form>
                        @else
                            <header>
                                <h1 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle text-blue-500 mr-1"></i> Lección: {{ $item->name }}</h1>
                            </header>
                            <div x-show="open">
                                <hr class="my-2">
                                <p class="text-sm">Plataforma: {{ $item->platform->name }}</p>
                                <p class="text-sm">Enlace: <a class="text-blue-600" href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></p>
                                <div class="my-2">
                                    <button class="btn btn-primary text-sm" wire:click="edit({{ $item }})">Editar</button>
                                    <button class="btn btn-danger text-sm" wire:click="destroy({{ $item }})">Eliminar</button>
                                </div>

                                <div class="mb-4">
                                    @livewire('instructor.lesson-description', ['lesson' => $item], key($item->id))
                                </div>

                                <div>
                                    @livewire('instructor.lesson-resources', ['lesson' => $item], key($item->id))
                                </div>
                            </div>     
                        @endif
                    </div>
                </article>
            @endforeach

            <div class="mt-4" x-data="{ open: false }">
                <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
                    <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
                    Agregar nueva lección
                </a>
                <article class="card" x-show="open">
                    <div class="card-body">
                        <h1 class="text-xl font-bold mb-4">Agregar nueva lección</h1>
                        <div class="mb-4">
                            <div class="flex items-center">
                                <label class="w-32">Nombre:</label>
                                <input wire:model="name" class="form-input w-full">
                            </div>
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror

                            <div class="flex items-center mt-4">
                                <label class="w-32">Plataforma: </label>
                                <select wire:model="platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($platforms as $platform)
                                        <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('platform_id')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror

                            <div class="flex items-center mt-4">
                                <label class="w-32">URL:</label>
                                <input wire:model="url" class="form-input w-full">
                            </div>
                            @error('url')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                            <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
1. Programar controlador del componente **app\Http\Livewire\Instructor\LessonResources.php**:
    >
        <?php

        namespace App\Http\Livewire\Instructor;

        use App\Models\Lesson;
        use Illuminate\Support\Facades\Storage;
        use Livewire\Component;
        use Livewire\WithFileUploads;

        class LessonResources extends Component
        {
            use WithFileUploads;

            public $lesson, $file;

            public function mount(Lesson $lesson){
                $this->lesson = $lesson;
            }

            public function render()
            {
                return view('livewire.instructor.lesson-resources');
            }

            public function save(){
                $this->validate([
                    'file' => 'required'
                ]);

                $url = $this->file->store('resources');

                $this->lesson->resource()->create([
                    'url' => $url
                ]);

                $this->lesson = Lesson::find($this->lesson->id);
            }

            public function destroy(){
                Storage::delete($this->lesson->resource->url);
                $this->lesson->resource->delete();
                $this->lesson = Lesson::find($this->lesson->id);
            }

            public function download(){
                return response()->download(storage_path('app/public/' . $this->lesson->resource->url));
            }
        }
1. Diseñar vista del componente **resources\views\livewire\instructor\lesson-resources.blade.php**:
    >
        <div class="card" x-data="{ open: false }">
            <div class="card-body bg-gray-100">
                <header>
                    <h1 x-on:click="open = !open" class="cursor-pointer">Recursos de la lección</h1>
                </header>

                <div x-show="open">
                    <hr class="my-2">

                    @if ($lesson->resource)
                        <div class="flex justify-between items-center">
                            <p><i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i> {{ $lesson->resource->url }}</p>
                            <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
                        </div>
                    @else
                        <form wire:submit.prevent="save">
                            <div class="flex items-center">
                                <input wire:model="file" type="file" class="form-input flex-1">
                                <button type="submit" class="btn btn-primary text-sm ml-2">Guardar</button>
                            </div>
                            <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                                Cargando ...
                            </div>
                            @error('file')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </form>
                    @endif
                </div>
            </div>
        </div>
1. Agregar el método **deleting** en **app\Observers\LessonObserver.php**:
    >
        public function deleting(Lesson $lesson){
            if($lesson->resource){
                Storage::delete($lesson->resource->url);
                $lesson->resource->delete();
            }
        }
    Importar facade **Storage**:
    >
        use Illuminate\Support\Facades\Storage;
1. Crear un observador para el modelo **Section**:
    >
        $ php artisan make:observer SectionObserver
1. Registrar el observador SectionObserever en **app\Providers\AppServiceProvider.php**:
    >
        <?php

        namespace App\Providers;

        use Illuminate\Support\Facades\Blade;
        use Illuminate\Support\ServiceProvider;
        use App\Models\Lesson;
        use App\Models\Section;
        use App\Observers\LessonObserver;
        use App\Observers\SectionObserver;

        class AppServiceProvider extends ServiceProvider
        {
            /**
            * Register any application services.
            *
            * @return void
            */
            public function register()
            {
                //
            }

            /**
            * Bootstrap any application services.
            *
            * @return void
            */
            public function boot()
            {
                Lesson::observe(LessonObserver::class);
                Section::observe(SectionObserver::class);
                Blade::directive('routeIs', function ($expression) {
                    return "<?php if(Request::url() == route($expression)) : ?>";
                });
            }
        }
1. Programar **app\Observers\SectionObserver.php**:
    >
        <?php

        namespace App\Observers;

        use App\Models\Section;
        use Illuminate\Support\Facades\Storage;

        class SectionObserver
        {
            public function deleting(Section $section){
                foreach ($section->lessons as $lesson) {
                    if($lesson->resource){
                        Storage::delete($lesson->resource->url);
                        $lesson->resource->delete();
                    }
                }
            }
        }
1. Modificar la vista **resources\views\livewire\instructor\courses-lesson.blade.php**:
    >
        <div>
            @foreach ($section->lessons as $item)
                <article class="card mt-4" x-data="{open: false}">
                    <div class="card-body">
                        @if ($lesson->id == $item->id)
                            ≡
                        @else
                            <header>
                                <h1 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle text-blue-500 mr-1"></i> Lección: {{ $item->name }}</h1>
                            </header>
                            <div x-show="open">
                                ≡
                            </div>     
                        @endif
                    </div>
                </article>
            @endforeach
            ≡
        </div>
1. Modificar la vista **resources\views\livewire\instructor\courses-curriculum.blade.php**:
    >
        <div>
            <x-slot name="course">
                {{ $course->slug }}
            </x-slot>

            <h1 class="text-2xl font-bold">LECCIONES DEL CURSO</h1>
            <hr class="mt-2 mb-6">
            @foreach ($course->sections as $item)
                <article class="card mb-6" x-data="{open: true}">
                    <div class="card-body bg-gray-100">
                        @if ($section->id == $item->id)
                            ≡
                        @else
                            <header class="flex justify-between items-center">
                                <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Sección:</strong> {{ $item->name }}</h1>
                                ≡
                            </header>
                            <div x-show="open">
                                @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
                            </div>
                        @endif
                    </div>
                </article>
            @endforeach
            ≡
        </div>


### Video 46. Pequeña corrección
1. Corregir asignación de llaves en componentes en la vista **resources\views\livewire\instructor\courses-lesson.blade.php**:
    >
        ≡
        <div class="mb-4">
            @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description' . $item->id))
        </div>

        <div>
            @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources' . $item->id))
        </div>
        ≡


### Video 47. Metas del curso
1. Crear ruta para metas del curso en **routes\instructor.php**:
    >
        Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');
1. Crear método **goals** en el controlador **app\Http\Controllers\Instructor\CourseController.php**:
    >
        public function goals(Course $course){
            return view('instructor.courses.goals', compact('course'));
        }
1. Crear vista **resources\views\instructor\courses\goals.blade.php**:
    >
        <x-instructor-layout>
            <x-slot name="course">
                {{ $course->slug }}
            </x-slot>

            <div>
                @livewire('instructor.courses-goals', ['course' => $course], key('courses-goals' . $course->id))
            </div>

            <div class="my-8">
                @livewire('instructor.courses-requirements', ['course' => $course], key('courses-requirements' . $course->id))
            </div>

            <div>
                @livewire('instructor.courses-audiences', ['course' => $course], key('courses-audiences' . $course->id))
            </div>
        </x-instructor-layout>
1. Modificar plantilla **resources\views\layouts\instructor.blade.php**:
    >
        ≡
        <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
        <ul class="text-sm text-gray-600">
            <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-400 @else border-transparent @endif pl-2">
                <a href="{{ route('instructor.courses.edit', $course) }}">Información del curso</a>
            </li>
            <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif pl-2">
                <a href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones del curso</a>
            </li>
            <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) border-indigo-400 @else border-transparent @endif pl-2">
                <a href="{{ route('instructor.courses.goals', $course) }}">Metas del curso</a>
            </li>
            <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                <a href="">Estudiantes</a>
            </li>
        </ul>
        ≡
1. Crear componentes livewire:
    >
        $ php artisan make:livewire Instructor/CoursesGoals
        $ php artisan make:livewire Instructor/CoursesRequirements
        $ php artisan make:livewire Instructor/CoursesAudiences
1. Programar controlador del componente **app\Http\Livewire\Instructor\CoursesGoals.php**:
    >
        <?php

        namespace App\Http\Livewire\Instructor;

        use App\Models\Course;
        use App\Models\Goal;
        use Livewire\Component;

        class CoursesGoals extends Component
        {
            public $course, $goal, $name;

            protected $rules = [
                'goal.name' => 'required'
            ];

            public function mount(Course $course){
                $this->course = $course;
                $this->goal = new Goal();
            }

            public function render()
            {
                return view('livewire.instructor.courses-goals');
            }

            public function store(){
                $this->validate([
                    'name' => 'required'
                ]);
                $this->course->goals()->create([
                    'name' => $this->name
                ]);
                $this->reset('name');
                $this->course = Course::find($this->course->id);
            }

            public function edit(Goal $goal){
                $this->goal = $goal;
            }

            public function update(){
                $this->validate();
                $this->goal->save();
                $this->goal = new Goal();
                $this->course = Course::find($this->course->id);
            }

            public function destroy(Goal $goal){
                $goal->delete();
                $this->course = Course::find($this->course->id);
            }
        }
1. Diseñar vista del componente **resources\views\livewire\instructor\courses-goals.blade.php**:
    >
        <section>
            <h1 class="text-2xl font-bold">METAS DEL CURSO</h1>
            <hr class="mt-2 mb-6">

            @foreach ($course->goals as $item)
                <article class="card mb-4">
                    <div class="card-body bg-gray-100">
                        @if ($goal->id == $item->id)
                            <form wire:submit.prevent="update">
                                <input wire:model="goal.name" class="form-input w-full">
                                @error('goal.name')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </form>
                        @else
                            <header class="flex justify-between">
                                <h1>{{ $item->name }}</h1>
                                <div>
                                    <i wire:click="edit({{ $item }})" class="fas fa-edit text-blue-500 cursor-pointer"></i>
                                    <i wire:click="destroy({{ $item }})" class="fas fa-trash text-red-500 cursor-pointer ml-2"></i>
                                </div>
                            </header>
                        @endif
                    </div>
                </article>
            @endforeach

            <article class="card">
                <div class="card-body bg-gray-100">
                    <form wire:submit.prevent="store">
                        <input wire:model="name" class="form-input w-full" placeholder="Agregar el nombre de la meta">
                        @error('name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex justify-end mt-2">
                            <button type="submit" class="btn btn-primary">Agregar meta</button>
                        </div>
                    </form>
                </div>
            </article>
        </section>
1. Programar controlador del componente **app\Http\Livewire\Instructor\CoursesRequirements.php**:
    >
        <section>
            <h1 class="text-2xl font-bold">METAS DEL CURSO</h1>
            <hr class="mt-2 mb-6">

            @foreach ($course->goals as $item)
                <article class="card mb-4">
                    <div class="card-body bg-gray-100">
                        @if ($goal->id == $item->id)
                            <form wire:submit.prevent="update">
                                <input wire:model="goal.name" class="form-input w-full">
                                @error('goal.name')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </form>
                        @else
                            <header class="flex justify-between">
                                <h1>{{ $item->name }}</h1>
                                <div>
                                    <i wire:click="edit({{ $item }})" class="fas fa-edit text-blue-500 cursor-pointer"></i>
                                    <i wire:click="destroy({{ $item }})" class="fas fa-trash text-red-500 cursor-pointer ml-2"></i>
                                </div>
                            </header>
                        @endif
                    </div>
                </article>
            @endforeach

            <article class="card">
                <div class="card-body bg-gray-100">
                    <form wire:submit.prevent="store">
                        <input wire:model="name" class="form-input w-full" placeholder="Agregar el nombre de la meta">
                        @error('name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex justify-end mt-2">
                            <button type="submit" class="btn btn-primary">Agregar meta</button>
                        </div>
                    </form>
                </div>
            </article>
        </section>
1. Diseñar vista del componente **resources\views\livewire\instructor\courses-requirements.blade.php**:
    >
        <section>
            <h1 class="text-2xl font-bold">REQUERIMIENTOS DEL CURSO</h1>
            <hr class="mt-2 mb-6">

            @foreach ($course->requirements as $item)
                <article class="card mb-4">
                    <div class="card-body bg-gray-100">
                        @if ($requirement->id == $item->id)
                            <form wire:submit.prevent="update">
                                <input wire:model="requirement.name" class="form-input w-full">
                                @error('requirement.name')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </form>
                        @else
                            <header class="flex justify-between">
                                <h1>{{ $item->name }}</h1>
                                <div>
                                    <i wire:click="edit({{ $item }})" class="fas fa-edit text-blue-500 cursor-pointer"></i>
                                    <i wire:click="destroy({{ $item }})" class="fas fa-trash text-red-500 cursor-pointer ml-2"></i>
                                </div>
                            </header>
                        @endif
                    </div>
                </article>
            @endforeach

            <article class="card">
                <div class="card-body bg-gray-100">
                    <form wire:submit.prevent="store">
                        <input wire:model="name" class="form-input w-full" placeholder="Agregar el nombre de un requerimiento">
                        @error('name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex justify-end mt-2">
                            <button type="submit" class="btn btn-primary">Agregar requerimiento</button>
                        </div>
                    </form>
                </div>
            </article>
        </section>
1. Programar controlador del componente **app\Http\Livewire\Instructor\CoursesAudiences.php**:
    >
        <?php

        namespace App\Http\Livewire\Instructor;

        use App\Models\Audience;
        use App\Models\Course;
        use Livewire\Component;

        class CoursesAudiences extends Component
        {
            public $course, $audience, $name;

            protected $rules = [
                'audience.name' => 'required'
            ];

            public function mount(Course $course){
                $this->course = $course;
                $this->audience = new Audience();
            }

            public function render()
            {
                return view('livewire.instructor.courses-audiences');
            }

            public function store(){
                $this->validate([
                    'name' => 'required'
                ]);
                $this->course->audiences()->create([
                    'name' => $this->name
                ]);
                $this->reset('name');
                $this->course = Course::find($this->course->id);
            }

            public function edit(Audience $audience){
                $this->audience = $audience;
            }

            public function update(){
                $this->validate();
                $this->audience->save();
                $this->audience = new Audience();
                $this->course = Course::find($this->course->id);
            }

            public function destroy(Audience $audience){
                $audience->delete();
                $this->course = Course::find($this->course->id);
            }
        }
1. Diseñar vista del componente **resources\views\livewire\instructor\courses-audiences.blade.php**:
    >
        <section>
            <h1 class="text-2xl font-bold">AUDIENCIA DEL CURSO</h1>
            <hr class="mt-2 mb-6">

            @foreach ($course->audiences as $item)
                <article class="card mb-4">
                    <div class="card-body bg-gray-100">
                        @if ($audience->id == $item->id)
                            <form wire:submit.prevent="update">
                                <input wire:model="audience.name" class="form-input w-full">
                                @error('audience.name')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </form>
                        @else
                            <header class="flex justify-between">
                                <h1>{{ $item->name }}</h1>
                                <div>
                                    <i wire:click="edit({{ $item }})" class="fas fa-edit text-blue-500 cursor-pointer"></i>
                                    <i wire:click="destroy({{ $item }})" class="fas fa-trash text-red-500 cursor-pointer ml-2"></i>
                                </div>
                            </header>
                        @endif
                    </div>
                </article>
            @endforeach

            <article class="card">
                <div class="card-body bg-gray-100">
                    <form wire:submit.prevent="store">
                        <input wire:model="name" class="form-input w-full" placeholder="Agregar la audiencia del curso">
                        @error('name')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="flex justify-end mt-2">
                            <button type="submit" class="btn btn-primary">Agregar audiencia</button>
                        </div>
                    </form>
                </div>
            </article>
        </section>


### Video 48. Estudiantes del curso
1. Crear ruta **courses.estudents** en **routes\instructor.php**:
    >
        Route::get('courses/{course}/students', CoursesStudents::class)->name('courses.students');
    Importar componente:
    >
        use App\Http\Livewire\Instructor\CoursesStudents;
1. Crear componente de livewire para el control de la nueva ruta **courses.estudents**:
    >
        $ php artisan make:livewire Instructor/CoursesStudents
1. Programar el controlador del componente **app\Http\Livewire\Instructor\CoursesStudents.php**:
    >
        <?php

        namespace App\Http\Livewire\Instructor;

        use App\Models\Course;
        use Livewire\Component;
        use Livewire\WithPagination;

        class CoursesStudents extends Component
        {
            use WithPagination;

            public $course, $search;

            public function mount(Course $course){
                $this->course = $course;
            }

            public function updatingSearch(){
                $this->resetPage();
            }

            public function render()
            {
                $students = $this->course->students()
                            ->where('name', 'LIKE', '%' . $this->search . '%')
                            ->paginate(4);
                return view('livewire.instructor.courses-students', compact('students'))->layout('layouts.instructor');
            }
        }
1. Diseñar la vista del componente **resources\views\livewire\instructor\courses-students.blade.php**:
    >
        <div>
            <x-slot name="course">
                {{ $course->slug }}
            </x-slot>

            <h1 class="text-2xl font-bold mb-4">ESTUDIANTES DEL CURSO</h1>

            <x-table-responsive>
                <div class="px-6 py-4">
                    <input wire:model="search" class="form-input w-full shadow-sm" placeholder="Ingrese el nombre del estudiante ...">
                </div>
                @if ($students->count())
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($students as $student)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover object-center" src="{{ $student->profile_photo_url }}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $student->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $student->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                    </td>
                                </tr>  
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-6 py-4">
                        {{ $students->links() }}
                    </div>
                @else
                    <div class="px-6 py-4">
                        No hay ningún registro coincidente
                    </div>
                @endif
            </x-table-responsive>   
        </div>
1. Modificar plantilla **resources\views\layouts\instructor.blade.php**:
    >
        ≡
        <aside>
            <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
            <ul class="text-sm text-gray-600">
                <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-400 @else border-transparent @endif pl-2">
                    <a href="{{ route('instructor.courses.edit', $course) }}">Información del curso</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif pl-2">
                    <a href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones del curso</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) border-indigo-400 @else border-transparent @endif pl-2">
                    <a href="{{ route('instructor.courses.goals', $course) }}">Metas del curso</a>
                </li>
                <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) border-indigo-400 @else border-transparent @endif pl-2">
                    <a href="{{ route('instructor.courses.students', $course) }}">Estudiantes</a>
                </li>
            </ul>
        </aside>
        ≡





### Video 49. Agregar policies a los cursos
1. Reemplazar línea de código en **database\factories\CourseFactory.php**:
    Cambiar:
    + 'user_id' => 1,
    Por:
    + 'user_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
1. Reestablecer la base de datos:
    >
        $ php artisan migrate:fresh --seed
1. Crear método **dicatated** en **app\Policies\CoursePolicy.php**:
    >
        public function dicatated(User $user, Course $course){
            if($course->user_id == $user->id){
                return true;
            }else{
                return false;
            }
        }
1. Agregar la siguiente línea de código al principio de los métodos **edit**, **update** y **goals** del controlador **app\Http\Controllers\Instructor\CourseController.php**:
    >
        $this->authorize('dicatated', $course);
1. Modificar el controlador del componente **app\Http\Livewire\Instructor\CoursesCurriculum.php**:
    >
        <?php

        namespace App\Http\Livewire\Instructor;

        use App\Models\Course;
        use App\Models\Section;
        use Livewire\Component;
        use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

        class CoursesCurriculum extends Component
        {
            use AuthorizesRequests;

            public $course, $section, $name;

            protected $rules = [
                'section.name' => 'required'
            ];

            public function mount(Course $course){
                $this->course = $course;
                $this->section = new Section();
                $this->authorize('dicatated', $course);
            }
            ≡
1. Modificar el controlador del componente **app\Http\Livewire\Instructor\CoursesStudents.php**:
    >
        <?php

        namespace App\Http\Livewire\Instructor;

        use App\Models\Course;
        use Livewire\Component;
        use Livewire\WithPagination;
        use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

        class CoursesStudents extends Component
        {
            use WithPagination;
            use AuthorizesRequests;

            public $course, $search;

            public function mount(Course $course){
                $this->course = $course;
                $this->authorize('dicatated', $course);
            }
            ≡
1. Agregar el método **__construct** al principio de la clase **CourseController** del controlador **app\Http\Controllers\Instructor\CourseController.php**:
    >
        public function __construct(){
            $this->middleware('can:Leer cursos')->only('index');
            $this->middleware('can:Crear cursos')->only('create', 'store');
            $this->middleware('can:Actualizar cursos')->only('edit', 'update', 'goals');
            $this->middleware('can:Eliminar cursos')->only('destroy');
        }
1. Agregar middleware a las rutas del archivo routes\instructor.php:
    >
        <?php

        use App\Http\Controllers\Instructor\CourseController;
        use App\Http\Livewire\Instructor\CoursesCurriculum;
        use Illuminate\Support\Facades\Route;
        use App\Http\Livewire\Instructor\CoursesStudents;

        Route::redirect('', 'instructor/courses');

        Route::resource('courses', CourseController::class)->names('courses');

        Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:Actualizar cursos')->name('courses.curriculum');

        Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

        Route::get('courses/{course}/students', CoursesStudents::class)->middleware('can:Actualizar cursos')->name('courses.students');


## Sección 7: Áprobación de un curso


### Video 50. Agregar botón que solicite aprobación
1. Modificar plantilla **resources\views\layouts\instructor.blade.php**:
    >
        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <title>{{ config('app.name', 'Laravel') }}</title>

                <!-- Fonts -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

                <!-- Styles -->
                <link rel="stylesheet" href="{{ mix('css/app.css') }}">
                <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

                @livewireStyles

                <!-- Scripts -->
                <script src="{{ mix('js/app.js') }}" defer></script>
            </head>
            <body class="font-sans antialiased">
                <div class="min-h-screen bg-gray-100">
                    @livewire('navigation-dropdown')

                    <!-- Page Content -->
                    <div class="container py-8 grid grid-cols-5 gap-6">
                        <aside>
                            <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
                            <ul class="text-sm text-gray-600 mb-4">
                                <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-400 @else border-transparent @endif pl-2">
                                    <a href="{{ route('instructor.courses.edit', $course) }}">Información del curso</a>
                                </li>
                                <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif pl-2">
                                    <a href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones del curso</a>
                                </li>
                                <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) border-indigo-400 @else border-transparent @endif pl-2">
                                    <a href="{{ route('instructor.courses.goals', $course) }}">Metas del curso</a>
                                </li>
                                <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) border-indigo-400 @else border-transparent @endif pl-2">
                                    <a href="{{ route('instructor.courses.students', $course) }}">Estudiantes</a>
                                </li>
                            </ul>

                            @switch($course->status)
                                @case(1)
                                    <form action="{{ route('instructor.courses.status', $course) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Solicitar revisión</button>
                                    </form>
                                    @break
                                @case(2)
                                    <div class="card text-gray-500">
                                        <div class="card-body">
                                            Este curso se encuentra en revisión
                                        </div>
                                    </div>
                                    @break
                                @case(3)
                                    <div class="card text-gray-500">
                                        <div class="card-body">
                                            Este curso se encuentra publicado
                                        </div>
                                    </div>
                                    @break
                                @default     
                            @endswitch
                        </aside>
                        <div class="col-span-4 card">
                            <main class="card-body text-gray-600">
                                {{ $slot }}
                            </main>
                        </div>
                    </div>
                </div>

                @stack('modals')

                @livewireScripts

                @isset($js)
                    {{ $js }}  
                @endisset
            </body>
        </html>
1. Agregar ruta para status del curso en el archivo de rutas **routes\instructor.php**:
    >
        Route::post('courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');
1. Crear método **status** en el controlador **app\Http\Controllers\Instructor\CourseController.php**:
    >
        public function status(Course $course){
            $course->status = 2;
            $course->save();
            return back();
        }
1. Modificar la vista **resources\views\instructor\courses\edit.blade.php**:
    >
        <x-instructor-layout :course="$course">
            <h1 class="text-2xl font-bold">INFORMACIÓN DEL CURSO</h1>
            <hr class="mt-2 mb-6">
            {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}

                @include('instructor.courses.partials.form')

                <div class="flex justify-end">
                    {!! Form::submit('Actualizar información', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}

            <x-slot name="js">
                <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
                <script src="{{ asset('js\instructor\courses\form.js') }}"></script>
            </x-slot>
        </x-instructor-layout>
1. Modificar **app\View\Components\InstructorLayout.php**:
    >
        <?php

        namespace App\View\Components;

        use Illuminate\View\Component;

        class InstructorLayout extends Component
        {
            public $course;
            /**
            * Create a new component instance.
            *
            * @return void
            */
            public function __construct($course)
            {
                $this->course = $course;
            }

            /**
            * Get the view / contents that represent the component.
            *
            * @return \Illuminate\Contracts\View\View|string
            */
            public function render()
            {
                return view('layouts.instructor');
            }
        }
1. Modificar el método render del controlador **app\Http\Livewire\Instructor\CoursesCurriculum.php**:
    >
        public function render()
        {
            // Le indicaremos que queremos utilizar una plantilla con la vista
            return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor', ['course' => $this->course]);
        }
1. Eliminar las siguiente línes de código de la vista **resources\views\livewire\instructor\courses-curriculum.blade.php**:
    >
        <x-slot name="course">
            {{ $course->slug }}
        </x-slot>
1. Modificar la vista **resources\views\instructor\courses\goals.blade.php**:
    >
        <x-instructor-layout :course="$course">
            <div>
                @livewire('instructor.courses-goals', ['course' => $course], key('courses-goals' . $course->id))
            </div>

            <div class="my-8">
                @livewire('instructor.courses-requirements', ['course' => $course], key('courses-requirements' . $course->id))
            </div>

            <div>
                @livewire('instructor.courses-audiences', ['course' => $course], key('courses-audiences' . $course->id))
            </div>
        </x-instructor-layout>
1. Modificar el método **render** del controlador del componente **app\Http\Livewire\Instructor\CoursesStudents.php**:
    >
        public function render()
        {
            $students = $this->course->students()
                        ->where('name', 'LIKE', '%' . $this->search . '%')
                        ->paginate(4);
            return view('livewire.instructor.courses-students', compact('students'))->layout('layouts.instructor', ['course' => $this->course]);
        }
1. Eliminar las siguientes líneas de código de la vista del componente **resources\views\livewire\instructor\courses-students.blade.php**:
    >
        <x-slot name="course">
            {{ $course->slug }}
        </x-slot>


### Video 51. Cursos pendientes de aprobación
1. Modificar el archivo de configuración **config\adminlte.php**:
    >
        <?php

        return [
            ≡
            'layout_topnav' => null,
            'layout_boxed' => null,
            'layout_fixed_sidebar' => true,
            'layout_fixed_navbar' => null,
            'layout_fixed_footer' => null,
            ≡
            'menu' => [
                [
                    'text'      => 'search',
                    'search'    => true,
                    'topnav'    => true,
                ],
                [
                    'text' => 'blog',
                    'url'  => 'admin/blog',
                    'can'  => 'manage-blog',
                ],
                [
                    'text'  => 'Dashboard',
                    'route' => 'admin.home',
                    'icon'  => 'fas fa-fw fa-tachometer-alt',
                    'can'   => 'Ver dashboard'
                ],
                [
                    'text'      => 'Lista de roles',
                    'route'     => 'admin.roles.index',
                    'icon'      => 'fas fa-fw fa-users-cog',
                    'can'       => 'Listar role',
                    'active'    => ['admin/roles*'],
                ],
                [
                    'text'      => 'Usuarios',
                    'route'     => 'admin.users.index',
                    'icon'      => 'fas fa-fw fa-users',
                    'can'       => 'Leer usuarios',
                    'active'    => ['admin/users*'],
                ],
                ['header' => 'OPCIONES DE CURSO'],
                [
                    'text' => 'Pendientes de aprobación',
                    'route'  => 'admin.courses.index',
                    'icon' => 'fas fa-fw fa-user',
                ],
                [
                    'text' => 'change_password',
                    'url'  => 'admin/settings',
                    'icon' => 'fas fa-fw fa-lock',
                ],
                ≡     
1. Crear controlador para administrar cursos:
    >
        $ php artisan make:controller Admin\CourseController
1. Crear ruta para la aprobación de cursos en **routes\admin.php**:
    >
        Route::get('courses',[CourseController::class, 'index'])->name('courses.index');
    Importar controlador **app\Http\Controllers\Admin\CourseController.php**:
    >
        use App\Http\Controllers\Admin\CourseController;
1. Programar el controlador **app\Http\Controllers\Admin\CourseController.php**:
    >
        <?php

        namespace App\Http\Controllers\Admin;

        use App\Http\Controllers\Controller;
        use App\Models\Course;
        use Illuminate\Http\Request;

        class CourseController extends Controller
        {
            public function index(){
                $courses = Course::where('status', 2)->paginate();
                return view('admin.courses.index', compact('courses'));
            }
        }
1. Crear vista **resources\views\admin\courses\index.blade.php**:
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Cursos pendientes de aprobación</h1>
        @stop

        @section('content')
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->category->name }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="">Revisar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{ $courses->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
        @stop
1. Publicar vistas de paginación:
    >
        $ php artisan vendor:publish --tag=laravel-pagination


### Video 52. Aprobar curso
###### https://tailwind-starter-kit.vercel.app/docs/badges
1. Crear ruta para la revisión de cursos en **routes\admin.php**:
    >
        Route::get('courses/{course}',[CourseController::class, 'show'])->name('courses.show');
1. Crear método **show** en el controlador **app\Http\Controllers\Admin\CourseController.php**:
    >
        public function show(Course $course){
            $this->authorize('revision', $course);
            return view('admin.courses.show', compact('course'));
        }
1. Modificar vista **resources\views\admin\courses\index.blade.php**:
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Cursos pendientes de aprobación</h1>
        @stop

        @section('content')
            @if (session('info'))
                <div class="alert alert-success">
                    {{ session('info') }}
                </div>
            @endif    

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->category->name }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('admin.courses.show', $course) }}">Revisar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    {{ $courses->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script> console.log('Hi!'); </script>
        @stop
1. Copiar **resources\views\courses\show.blade.php** y pegar en **resources\views\admin\courses\show.blade.php** y modificar:
    >
        <x-app-layout>
            <section class="bg-gray-700 py-12 mb-12">
                <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <figure>
                        @if ($course->image)
                            <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url )}}" alt="">
                        @else
                            <img class="h-60 w-full object-cover" src="https://images.pexels.com/photos/5940721/pexels-photo-5940721.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                        @endif
                    </figure>
                    <div class="text-white">
                        <h1 class="text-4xl">{{ $course->title }}</h1>
                        <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                        <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{ $course->level->name }}</p>
                        <p class="mb-2"><i class=""></i> Categoría: {{ $course->category->name }}</p>
                        <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{ $course->students_count }}</p>
                        <p><i class="far fa-star"></i> Calificación: {{ $course->rating }}</p>
                    </div>
                </div>
            </section>

            <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
                @if (session('info'))
                    <div class="lg:col-span-3">
                        {{-- <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role>
                            <strong class="font-bold">Ocurrio un error!</strong>
                            <span class="block sm:inline">{{ session('info') }}</span>
                            <span class="absolute top-0 botton-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/20"></svg>
                            </span>
                        </div> --}}
                        <div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert" x-data="{open: true}" x-show="open">
                            <p>Ocurrio un error! {{ session('info') }}</p>
                            <span class="absolute inset-y-0 right-0 flex items-center mr-4">
                            <svg x-on:click="open=false" class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20"><path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                            </span>
                        </div>
                    </div>
                @endif
                <div class="order-2 lg:col-span-2 lg:order-1">
                    {{-- METAS --}}
                    <section class="card mb-12">
                        <div class="card-body">
                            <h1 class="font-bold text-2xl mb-2">Lo que aprenderás</h1>
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                                @forelse ($course->goals as $goal)
                                    <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{ $goal->name }}</li>
                                @empty
                                    <li class="text-gray-700 text-base">Este curso no tiene asignado ninguna meta</li>
                                @endforelse
                            </ul>
                        </div>
                    </section>
                    {{-- TEMARIO --}}
                    <section class="mb-12">
                        <h1 class="font-bold text-3xl mb-2">Temario</h1>
                        @forelse ($course->sections as $section)
                            <article class="mb-4 shadow" 
                                @if ($loop->first)
                                    x-data="{ open: true }"
                                @else
                                    x-data="{ open: false }"    
                                @endif>
                                    <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open = !open">
                                        <h1 class="font-bold text-lg text-gray-600">{{ $section->name }}</h1>
                                    </header>
                                    <div class="bg-white py-2 px-4" x-show="open">
                                        <ul class="grid grid-cols-1 gap-2">
                                            @foreach ($section->lessons as $lesson)
                                                <li class="text-gray-700 text-base"><i class="fas fa-play-circle mr-2 text-gray-600"></i> {{ $lesson->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                            </article>
                        @empty
                            <article class="card">
                                <div class="card-body">
                                    Este curso no tiene ninguna sección asignada
                                </div>
                            </article>
                        @endforelse
                    </section>
                    {{-- REQUISITOS --}}
                    <section>
                        <h1 class="font-bold text-3xl">Requisitos</h1>
                        <ul class="list-disc list-inside">
                            @forelse ($course->requirements as $requirement)
                                <li class="text-gray-700">{{ $requirement->name }}</li>
                            @empty
                                <li class="text-gray-700">Este curso no tiene ningún requerimiento</li>
                            @endforelse
                        </ul>
                    </section>
                    {{-- DESCRIPCIÓN --}}
                    <section>
                        <h1 class="font-bold text-3xl">Descripción</h1>
                        <div class="text-gray-700 text-base">
                            {!! $course->description !!}
                        </div>
                    </section>
                </div>
                <div class="order-1 lg:order-2">
                    <section class="card mb-4">
                        <div class="card-body">
                            <div class="flex items-center">
                                <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                                <div class="ml-4">
                                    <h1 class="font-bold text-gray-500 text-lg">Prof. {{ $course->teacher->name }}</h1>
                                    <a class="text-blue-400 text-sm font-bold" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                                </div>
                            </div>
                            <form action="{{ route('admin.courses.approved', $course) }}" class="mt-4" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger w-full">Aprobar curso</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </x-app-layout>
1. En la vista **resources\views\courses\show.blade.php** reemplazar:
    >
        <section>
            <h1 class="font-bold text-3xl">Descripción</h1>
            <div class="text-gray-700 text-base">
                {{ $course->description }}
            </div>
        </section>  
    Por:
    >
        <section>
            <h1 class="font-bold text-3xl">Descripción</h1>
            <div class="text-gray-700 text-base">
                {!! $course->description !!}
            </div>
        </section>        
1. Crear ruta para la aprobación de cursos en **routes\admin.php**:
    >
        Route::post('courses/{course}/approved',[CourseController::class, 'approved'])->name('courses.approved');
1. Crear método **approved** en el controlador **app\Http\Controllers\Admin\CourseController.php**:
    >
        public function approved(Course $course){
            $this->authorize('revision', $course);
            if(!$course->lessons || !$course->goals || !$course->requirements || !$course->image){
                return back()->with('info', 'No se puede publicar un curso que no esté completo');
            }
            $course->status = 3;
            $course->save();
            return redirect()->route('admin.courses.index')->with('info', 'El curso se publicó con éxito');
        }
1. Crear método **revision** en **app\Policies\CoursePolicy.php**:
    >
        public function revision(User $user, Course $course){
            if($course->status == 2){
                return true;
            }else{
                return false;
            }
        }


### Video 53. Enviar correo de aprobación de curso
1. Indicar las credenciales de Mailtrap en **.env**:
    >
        MAIL_MAILER=smtp
        MAIL_HOST=smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=7c67f786972696
        MAIL_PASSWORD=8f37b2d25228ba
        MAIL_ENCRYPTION=tls
1. Modificar las siguientes variables de entorno en **.env**:
    Cambiar:
    >
        MAIL_FROM_ADDRESS=null
        MAIL_FROM_NAME="${APP_NAME}"
    Por:
    >
        MAIL_FROM_ADDRESS=petrix@solucionespp.com
        MAIL_FROM_NAME="SOLUCIONES ++"
1. Crear un **maillable** para correos de cursos aprobados:
    >
        $ php artisan make:mail ApprovedCourse
1. Programar el archivo **app\Mail\ApprovedCourse.php**:
    >
        <?php

        namespace App\Mail;

        use App\Models\Course;
        use Illuminate\Bus\Queueable;
        use Illuminate\Contracts\Queue\ShouldQueue;
        use Illuminate\Mail\Mailable;
        use Illuminate\Queue\SerializesModels;

        class ApprovedCourse extends Mailable
        {
            use Queueable, SerializesModels;

            public $course;

            /**
            * Create a new message instance.
            *
            * @return void
            */
            public function __construct(Course $course)
            {
                $this->course = $course;
            }

            /**
            * Build the message.
            *
            * @return $this
            */
            public function build()
            {
                return $this->view('mail.approved-course')
                    ->subject('CURSO APROBADO');
            }
        }
1. Crear vista para correo en **resources\views\mail\approved-course.blade.php**:
    >
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <style>
                h1{
                    color:red;
                }
            </style>
        </head>
        <body>
            <h1>Este es un correo electrónico de prueba</h1>
            <p>El curso <strong>{{ $course->title }}</strong> se ha aprobado con éxito</p>
        </body>
        </html>
1. Modificar método **approved** en **app\Http\Controllers\Admin\CourseController.php**:
    >
        public function approved(Course $course){
            $this->authorize('revision', $course);
            if(!$course->lessons || !$course->goals || !$course->requirements || !$course->image){
                return back()->with('info', 'No se puede publicar un curso que no esté completo');
            }
            $course->status = 3;
            $course->save();

            // Enviar correo electrónico
            $mail = new ApprovedCourse($course);
            Mail::to($course->teacher->email)->send($mail);

            return redirect()->route('admin.courses.index')->with('info', 'El curso se publicó con éxito');
        }
    Importar las siguiente librerias:
    >
        use Illuminate\Support\Facades\Mail;
        use App\Mail\ApprovedCourse;    


### Video 54. Enviar coreos con Queues
1. Modificar varible de entorno en **.env**:
    Cambiar:
    >
        QUEUE_CONNECTION=sync
    Por:
    >
        QUEUE_CONNECTION=database
1. Crear tabla **jobs** para las colas de trabajo:
    >
        $ php artisan queue:table
        $ php artisan migrate
    Nota: para ejecutar los queue es necesario ejecutar:
    >
        $ php artisan queue:work
1. Cambiar la siguiente línea de código en el método **approved** del controlador **app\Http\Controllers\Admin\CourseController.php**:
    Cambiar:
    >
        Mail::to($course->teacher->email)->send($mail);
    Por:
    >
         Mail::to($course->teacher->email)->queue($mail);


### Video 55. Observar cursos
2. Habilitar la asignación masiva en modelo **app\Models\Observation.php**:
    >
        ≡
        class Observation extends Model
        {
            use HasFactory;

            protected $fillable = [
                'body',
                'course_id'
            ];
        }       
3. Agregar la relación Observation-Course:
    + **app\Models\Course.php**:
    >
        // Relación 1:1
        public function observation(){
            return $this->hasOne('App\Models\Observation');
        }
    + **app\Models\Observation.php**
    >
        // Relación 1:1 inversa
        public function course(){
            return $this->belongsTo('App\Models\Course');
        }
4. Ejecutar las migraciones:
    >
        $ php artisan migrate
5. Modificar vista **resources\views\admin\courses\show.blade.php**:
    >
        ≡
                <div class="order-1 lg:order-2">
                    <section class="card mb-4">
                        <div class="card-body">
                            <div class="flex items-center">
                                <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                                <div class="ml-4">
                                    <h1 class="font-bold text-gray-500 text-lg">Prof. {{ $course->teacher->name }}</h1>
                                    <a class="text-blue-400 text-sm font-bold" href="">{{ '@' . Str::slug($course->teacher->name, '') }}</a>
                                </div>
                            </div>
                            <form action="{{ route('admin.courses.approved', $course) }}" class="mt-4" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-full">Aprobar curso</button>
                            </form>
                            <a href="{{ route('admin.courses.observation', $course) }}" class="btn btn-danger w-full block text-center mt-4">Observar curso</a>
                        </div>
                    </section>
                </div>
            </div>
        </x-app-layout>
6. Crear ruta para observar curso en **routes\admin.php**:
    >
        Route::get('courses/{course}/observation',[CourseController::class, 'observation'])->name('courses.observation');
7. Crear método **observation** en el controlador **app\Http\Controllers\Admin\CourseController.php**:
    >
        public function observation(Course $course){
            return view('admin.courses.observation', compact('course'));
        }
8. Crear vista **resources\views\admin\courses\observation.blade.php**:
    ##### CDN: https://ckeditor.com/ckeditor-5/download/?undefined-addons=
    ##### Activación: https://ckeditor.com/docs/ckeditor5/latest/builds/guides/quick-start.html
    >
        @extends('adminlte::page')

        @section('title', 'Coders Free')

        @section('content_header')
            <h1>Observaciones del curso: {{ $course->title }}</h1>
        @stop

        @section('content')
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
                        <div class="form-group">
                            {!! Form::label('body', 'Observaciones del curso') !!}
                            {!! Form::textarea('body', null) !!}
                            @error('body')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        {!! Form::submit('Rechazar curso', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
            <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
            <script>
                ClassicEditor
                    .create( document.querySelector( '#body' ) )
                    .catch( error => {
                        console.error( error );
                    } );
            </script>
        @stop
9. Crear ruta para rechazar curso en **routes\admin.php**:
    >
        Route::post('courses/{course}/reject',[CourseController::class, 'reject'])->name('courses.reject');
10. Crear método **reject** en el controlador **app\Http\Controllers\Admin\CourseController.php**:
    >
        public function reject(Request $request, Course $course){
            $request->validate([
                'body' => 'required'
            ]);

            $course->observation()->create($request->all());
            $course->status = 1;
            $course->save();

            // Enviar correo electrónico
            $mail = new RejectCourse($course);
            Mail::to($course->teacher->email)->queue($mail);

            return redirect()->route('admin.courses.index')->with('info', 'El curso se rechazado con éxito');
        }
    Importar:
    >
        use App\Mail\RejectCourse;
11. Crear maillable para indicar al instructor que su curso se ha rechazado:
    >
        $ php artisan make:mail RejectCourse
12. Programar controlador app\Mail\RejectCourse.php:
    >
        <?php

        namespace App\Mail;

        use App\Models\Course;
        use Illuminate\Bus\Queueable;
        use Illuminate\Contracts\Queue\ShouldQueue;
        use Illuminate\Mail\Mailable;
        use Illuminate\Queue\SerializesModels;

        class RejectCourse extends Mailable
        {
            use Queueable, SerializesModels;

            public $course;

            /**
            * Create a new message instance.
            *
            * @return void
            */
            public function __construct(Course $course)
            {
                $this->course = $course;
            }

            /**
            * Build the message.
            *
            * @return $this
            */
            public function build()
            {
                return $this->view('mail.reject-course')
                    ->subject('CURSO RECHAZADO');
            }
        }
13. Crear vista **resources\views\mail\reject-course.blade.php**:
    >
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <style>
                h1{
                    color:red;
                }
            </style>
        </head>
        <body>
            <h1>Este es un correo electrónico de prueba</h1>
            <p>El curso <strong>{{ $course->title }}</strong> ha sido rechazado</p>
            <h2>Motivo del rechazo</h2>
            {!! $course->observation->body !!}
        </body>
        </html>
14. Para que los queue se ejecuten:
    >
        $ php artisan queue:work
15. Modificar plantilla **resources\views\layouts\instructor.blade.php**:
    >
        ≡
        <!-- Page Content -->
        <div class="container py-8 grid grid-cols-5 gap-6">
            <aside>
                <h1 class="font-bold text-lg mb-4">Edición del curso</h1>
                <ul class="text-sm text-gray-600 mb-4">
                    <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-indigo-400 @else border-transparent @endif pl-2">
                        <a href="{{ route('instructor.courses.edit', $course) }}">Información del curso</a>
                    </li>
                    <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif pl-2">
                        <a href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones del curso</a>
                    </li>
                    <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) border-indigo-400 @else border-transparent @endif pl-2">
                        <a href="{{ route('instructor.courses.goals', $course) }}">Metas del curso</a>
                    </li>
                    <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) border-indigo-400 @else border-transparent @endif pl-2">
                        <a href="{{ route('instructor.courses.students', $course) }}">Estudiantes</a>
                    </li>
                    @if ($course->observation)
                    <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.observation', $course) border-indigo-400 @else border-transparent @endif pl-2">
                        <a href="{{ route('instructor.courses.observation', $course) }}">Observaciones</a>
                    </li>
                    @endif
                </ul>
                ≡
16. Crear ruta para mostrar las observaciones en **routes\instructor.php**:
    >
        Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');
17. Crear método **observation** en el controlador **app\Http\Controllers\Instructor\CourseController.php**:
    >
        public function observation(Course $course){
            return view('instructor.courses.observation', compact('course'));
        }
18. Crear la vista **resources\views\instructor\courses\observation.blade.php**:
    >
        <x-instructor-layout :course="$course">
            <h1 class="text-2xl font-bold">OBSERVACIONES DEL CURSO</h1>
            <hr class="mt-2 mb-6">

            <div class="text-gray-500">
                {!! $course->observation->body !!}
            </div>
        </x-instructor-layout>
19. Modificar el método **status** del controlador **app\Http\Controllers\Instructor\CourseController.php**:
    >
        public function status(Course $course){
            $course->status = 2;
            $course->save();

            $course->observation->delete();

            return redirect()->route('instructor.courses.edit', $course);
        }


## Sección 8: Crud pendientes


### Video 56. CRUD de categorías
1. Crear ruta para CRUD categorias en **routes\admin.php**:
    >
        Route::resource('categories', CategoryController::class)->names('categories');
    Importar:
    >
        use App\Http\Controllers\Admin\CategoryController;
1. Crear controlador para el CRUD categorias:
    >
        $ php artisan make:controller Admin\CategoryController -r
1. Programar el controlador **app\Http\Controllers\Admin\CategoryController.php**:
    >
        <?php

        namespace App\Http\Controllers\Admin;

        use App\Http\Controllers\Controller;
        use Illuminate\Http\Request;
        use App\Models\Category;

        class CategoryController extends Controller
        {
            /**
            * Display a listing of the resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function index()
            {
                $categories = Category::all();
                return view('admin.categories.index', compact('categories'));
            }

            /**
            * Show the form for creating a new resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function create()
            {
                return view('admin.categories.create');
            }

            /**
            * Store a newly created resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @return \Illuminate\Http\Response
            */
            public function store(Request $request)
            {
                $request->validate([
                    'name' => 'required|unique:categories'
                ]);
                $category = Category::create($request->all());
                return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoría se creó con éxito');
            }

            /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function show(Category $category)
            {
                return view('admin.categories.show', compact('category'));
            }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit(Category $category)
            {
                return view('admin.categories.edit', compact('category'));
            }

            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function update(Request $request, Category $category)
            {
                $request->validate([
                    'name' => 'required|unique:categories,name,'.$category->id
                ]);
                $category->update($request->all());
                return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoría se actualizó con éxito');
            }

            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy(Category $category)
            {
                $category->delete();
                return redirect()->route('admin.categories.index')->with('info', 'La categoría se eliminó con éxito');
            }
        }
1. Crear vistas:
    + **resources\views\admin\categories\index.blade.php**:
        >
            @extends('adminlte::page')

            @section('title', 'Coders Free')

            @section('content_header')
                <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.categories.create') }}">Nueva categoría</a>
                <h1>Lista de categorías</h1>
            @stop

            @section('content')
                @if (session('info'))
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $category->id }}
                                        </td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td width="10px">
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                                        </td>
                                        <td width="10px">
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @stop
    + **resources\views\admin\categories\create.blade.php**:
        >
            @extends('adminlte::page')

            @section('title', 'Coders Free')

            @section('content_header')
                <h1>Crear nueva categoría</h1>
            @stop

            @section('content')
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.categories.store']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría']) !!}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {!! Form::submit('Crear categoría', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            @stop

            @section('css')
                <link rel="stylesheet" href="/css/admin_custom.css">
            @stop

            @section('js')
                <script> console.log('Hi!'); </script>
            @stop
    + **resources\views\admin\categories\edit.blade.php**:
        >
            @extends('adminlte::page')

            @section('title', 'Coders Free')

            @section('content_header')
                <h1>Editar categoría</h1>
            @stop

            @section('content')
                @if (session('info'))
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría']) !!}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            @stop

            @section('css')
                <link rel="stylesheet" href="/css/admin_custom.css">
            @stop

            @section('js')
                <script> console.log('Hi!'); </script>
            @stop
    + **resources\views\admin\categories\show.blade.php**:
        >
            @extends('adminlte::page')

            @section('title', 'Coders Free')

            @section('content_header')
                <h1>Detalle de categoría</h1>
            @stop

            @section('content')
                <p>Welcome to this beautiful admin panel.</p>
            @stop

            @section('css')
                <link rel="stylesheet" href="/css/admin_custom.css">
            @stop

            @section('js')
                <script> console.log('Hi!'); </script>
            @stop
1. Agregar menú de categorías en el archivo de configuración **config\adminlte.php**:
    >
        ≡
        ['header' => 'OPCIONES DE CURSO'],
        [
            'text' => 'Categoría',
            'route'  => 'admin.categories.index',
            'icon' => 'fas fa-fw fa-cogs',
        ],
        [
            'text' => 'Pendientes de aprobación',
            'route'  => 'admin.courses.index',
            'icon' => 'fas fa-fw fa-user',
        ],
        ≡


### Video 57. CRUD de niveles
1. Crear ruta **levels** en **routes\admin.php**:
    >
        Route::resource('levels', LevelController::class)->names('levels');
    Importar:
    >
        use App\Http\Controllers\Admin\LevelController;
1. Crear controlador para la ruta **levels**:
    >
        $ php artisan make:controller Admin\LevelController -r
1. Programar el controlador **app\Http\Controllers\Admin\LevelController.php**:
    >
        <?php

        namespace App\Http\Controllers\Admin;

        use App\Http\Controllers\Controller;
        use App\Models\Level;
        use Illuminate\Http\Request;

        class LevelController extends Controller
        {
            /**
            * Display a listing of the resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function index()
            {
                $levels = Level::all();
                return view('admin.levels.index', compact('levels'));
            }

            /**
            * Show the form for creating a new resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function create()
            {
                return view('admin.levels.create');
            }

            /**
            * Store a newly created resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @return \Illuminate\Http\Response
            */
            public function store(Request $request)
            {
                $request->validate([
                    'name' => 'required|unique:levels'
                ]);
                $level = Level::create($request->all());
                return redirect()->route('admin.levels.edit', $level)->with('info', 'El nivel se creó con éxito');
            }

            /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function show(Level $level)
            {
                return view('admin.levels.show', compact('level'));
            }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit(Level $level)
            {
                return view('admin.levels.edit', compact('level'));
            }

            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function update(Request $request, Level $level)
            {
                $request->validate([
                    'name' => 'required|unique:levels,name,'.$level->id
                ]);
                $level->update($request->all());
                return redirect()->route('admin.levels.edit', $level)->with('info', 'El nivel se actualizó con éxito');
            }

            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy(Level $level)
            {
                $level->delete();
                return redirect()->route('admin.levels.index')->with('info', 'El nivel se eliminó con éxito');
            }
        }
1. Crear las vistas para adiministra niveles:
    + **resources\views\admin\levels\index.blade.php**
        >
            @extends('adminlte::page')

            @section('title', 'Coders Free')

            @section('content_header')
                <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.levels.create') }}">Crear nivel</a>
                <h1>Lista de niveles</h1>
            @stop

            @section('content')
                @if (session('info'))
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($levels as $level)
                                    <tr>
                                        <td>
                                            {{ $level->id }}
                                        </td>
                                        <td>
                                            {{ $level->name }}
                                        </td>
                                        <td width="10px">
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.levels.edit', $level) }}">Editar</a>
                                        </td>
                                        <td width="10px">
                                            <form action="{{ route('admin.levels.destroy', $level) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @stop

            @section('css')
                <link rel="stylesheet" href="/css/admin_custom.css">
            @stop

            @section('js')
                <script> console.log('Hi!'); </script>
            @stop
    + **resources\views\admin\levels\create.blade.php**
        >
            @extends('adminlte::page')

            @section('title', 'Coders Free')

            @section('content_header')
                <h1>Crear nivel</h1>
            @stop

            @section('content')
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.levels.store']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nivel']) !!}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {!! Form::submit('Crear nivel', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            @stop

            @section('css')
                <link rel="stylesheet" href="/css/admin_custom.css">
            @stop

            @section('js')
                <script> console.log('Hi!'); </script>
            @stop
    + **resources\views\admin\levels\edit.blade.php**
        >
            @extends('adminlte::page')

            @section('title', 'Coders Free')

            @section('content_header')
                <h1>Editar nivel</h1>
            @stop

            @section('content')
                @if (session('info'))
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        {!! Form::model($level, ['route' => ['admin.levels.update', $level], 'method' => 'put']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nivel']) !!}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            @stop

            @section('css')
                <link rel="stylesheet" href="/css/admin_custom.css">
            @stop

            @section('js')
                <script> console.log('Hi!'); </script>
            @stop
    + **resources\views\admin\levels\show.blade.php**
        >
            @extends('adminlte::page')

            @section('title', 'Coders Free')

            @section('content_header')
                <h1>Coders Free</h1>
            @stop

            @section('content')
                <p>Welcome to this beautiful admin panel.</p>
            @stop

            @section('css')
                <link rel="stylesheet" href="/css/admin_custom.css">
            @stop

            @section('js')
                <script> console.log('Hi!'); </script>
            @stop
1. Agregar menú de niveles en el archivo de configuración **config\adminlte.php**:
    >
        ≡        
        ['header' => 'OPCIONES DE CURSO'],
        [
            'text' => 'Categoría',
            'route'  => 'admin.categories.index',
            'icon' => 'fas fa-fw fa-cogs',
        ],
        [
            'text' => 'Niveles',
            'route'  => 'admin.levels.index',
            'icon' => 'fas fa-fw fa-chart-line',
        ],
        ≡


### Video 58. CRUD de precios
1. Modificar el archivo de configuración **config\adminlte.php** para incluir el menú precios:
    >
        ≡
            ['header' => 'OPCIONES DE CURSO'],
            [
                'text' => 'Categoría',
                'route'  => 'admin.categories.index',
                'icon' => 'fas fa-fw fa-cogs',
            ],
            [
                'text' => 'Niveles',
                'route'  => 'admin.levels.index',
                'icon' => 'fas fa-fw fa-chart-line',
            ],
            [
                'text' => 'Precios',
                'route'  => 'admin.prices.index',
                'icon' => 'fab fa-fw fa-cc-visa',
            ],
            [
                'text' => 'Pendientes de aprobación',
                'route'  => 'admin.courses.index',
                'icon' => 'fas fa-fw fa-user',
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Menu Filters
        |--------------------------------------------------------------------------
        |
        | Here we can modify the menu filters of the admin panel.
        |
        | For more detailed instructions you can look here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/#83-custom-menu-filters
        |
        */
        ≡
1. Crear ruta para administrar CRUD de precios en **routes\admin.php**:
    >
        Route::resource('prices', PriceController::class)->names('prices');
    Importar:
    >
        use App\Http\Controllers\Admin\PriceController;
1. Crear controlador para la ruta **prices**:
    >
        $ php artisan make:controller Admin\PriceController -r
1. Programar el controlador **app\Http\Controllers\Admin\PriceController.php**:
    >
        <?php

        namespace App\Http\Controllers\Admin;

        use App\Http\Controllers\Controller;
        use App\Models\Price;
        use Illuminate\Http\Request;

        class PriceController extends Controller
        {
            /**
            * Display a listing of the resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function index()
            {
                $prices = Price::all();

                return view('admin.prices.index', compact('prices'));
            }

            /**
            * Show the form for creating a new resource.
            *
            * @return \Illuminate\Http\Response
            */
            public function create()
            {
                return view('admin.prices.create');
            }

            /**
            * Store a newly created resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @return \Illuminate\Http\Response
            */
            public function store(Request $request)
            {
                $request->validate([
                    'name' => 'required|unique:prices',
                    'value' => 'required|numeric'
                ]);

                $price = Price::create($request->all());

                return redirect()->route('admin.prices.edit', $price)->with('info','El precio se creó con éxito');
            }

            /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function show(Price $price)
            {
                //
            }

            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit(Price $price)
            {
                return view('admin.prices.edit', compact('price'));
            }

            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function update(Request $request, Price $price)
            {
                $request->validate([
                    'name' => 'required|unique:prices,name,'.$price->id,
                    'value' => 'required|numeric'
                ]);

                $price->update($request->all());

                return redirect()->route('admin.prices.edit', $price)->with('info','El precio se actualizó con éxito');
            }

            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy(Price $price)
            {
                $price->delete();
                return redirect()->route('admin.prices.index')->with('info','El precio se eliminó con éxito');
            }
        }
1. Crear las vistas para administrar precios:
    + **resources\views\admin\prices\index.blade.php**
        >
            @extends('adminlte::page')

            @section('title', 'Coders Free')

            @section('content_header')
                <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.prices.create') }}">Agregar precio</a>
                <h1>Lista de precios</h1>
            @stop

            @section('content')
                @if (session('info'))
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Valor</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prices as $price)
                                    <tr>
                                        <td>
                                            {{ $price->id }}
                                        </td>
                                        <td>
                                            {{ $price->name }}
                                        </td>
                                        <td>
                                            {{ $price->value }}
                                        </td>
                                        <td width="10px">
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.prices.edit', $price) }}">Editar</a>
                                        </td>
                                        <td width="10px">
                                            <form action="{{ route('admin.prices.destroy', $price) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @stop

            @section('css')
                <link rel="stylesheet" href="/css/admin_custom.css">
            @stop

            @section('js')
                <script> console.log('Hi!'); </script>
            @stop
    + **resources\views\admin\prices\create.blade.php**
        >
            @extends('adminlte::page')

            @section('title', 'Coders Free')

            @section('content_header')
                <h1>Agregar nuevo precio</h1>
            @stop

            @section('content')
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.prices.store']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del precio']) !!}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('value', 'Valor') !!}
                                {!! Form::number('value', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el valor del precio']) !!}
                                @error('value')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {!! Form::submit('Crear nuevo precio', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            @stop

            @section('css')
                <link rel="stylesheet" href="/css/admin_custom.css">
            @stop

            @section('js')
                <script> console.log('Hi!'); </script>
            @stop
    + **resources\views\admin\prices\edit.blade.php**
        >
            @extends('adminlte::page')

            @section('title', 'Coders Free')

            @section('content_header')
                <h1>Editar precio</h1>
            @stop

            @section('content')
                @if (session('info'))
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        {!! Form::model($price, ['route' => ['admin.prices.update', $price], 'method' => 'put']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del precio']) !!}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                {!! Form::label('value', 'Valor') !!}
                                {!! Form::number('value', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el valor del precio']) !!}
                                @error('value')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {!! Form::submit('Actualizar precio', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            @stop

            @section('css')
                <link rel="stylesheet" href="/css/admin_custom.css">
            @stop

            @section('js')
                <script> console.log('Hi!'); </script>
            @stop


### Video 59. Reseñas del curso
1. Crear factory para reseñas:
    >
        $ php artisan make:factory ReviewFactory
1. Programar el campo **definition** en el factory **database\factories\ReviewFactory.php**:
    >
        public function definition()
        {
            return [
                'comment' => $this->faker->text(),
                'rating' => $this->faker->randomElement([3, 4, 5]),
                'user_id' => User::all()->random()->id
            ];
        }
    Importar:
    >
        use App\Models\User;
1. Modificar el método **run** del seeder **database\seeders\CourseSeeder.php**:
    >
        public function run()
        {
            $courses = Course::factory(100)->create();

            foreach ($courses as $course) {
                Review::factory(5)->create([
                    'course_id' => $course->id
                ]);
                Image::factory(1)->create([
                    'imageable_id' => $course->id,
                    'imageable_type' => 'App\Models\Course'
                ]);
                ≡
    Importar:
    >
        use App\Models\Review;
1. Reestablecer la base de datos:
    >
        $ php artisan migrate:fresh --seed
1. Crear componente de livewire para mostrar reseñas:
    >
        $ php artisan make:livewire CoursesReviews
1. Programar el controlador del **componente app\Http\Livewire\CoursesReviews.php**:
    >
        <?php

        namespace App\Http\Livewire;

        use App\Models\Course;
        use Livewire\Component;

        class CoursesReviews extends Component
        {
            public $course_id, $comment;

            public $rating = 5;

            public function mount(Course $course){
                $this->course_id = $course->id;
            }

            public function render()
            {
                $course = Course::find($this->course_id);
                return view('livewire.courses-reviews', compact('course'));
            }

            public function store(){
                $course = Course::find($this->course_id);
                $course->reviews()->create([
                    'comment' => $this->comment,
                    'rating' => $this->rating,
                    'user_id' => auth()->user()->id
                ]);
            }
        }
1. Diseñar vista del componente **resources\views\livewire\courses-reviews.blade.php**:
    >
        <section class="mt-4">
            <h1 class="font-bold text-3xl text-gray-800 mb-2">Valoración</h1>
            @can('enrolled', $course)
                <article class="mb-4">
                    @can('valued', $course)
                        <textarea wire:model="comment" class="form-input w-full" rows="3" placeholder="Ingrese una reseña del curso"></textarea>
                        <div class="flex">
                            <button class="btn btn-primary mr-2" wire:click="store">Guardar</button>
                            <ul class="flex items-center">
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)">
                                    <i class="fas fa-star text-{{ $rating >= 1 ? 'yellow' : 'gray' }}-300"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)">
                                    <i class="fas fa-star text-{{ $rating >= 2 ? 'yellow' : 'gray' }}-300"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)">
                                    <i class="fas fa-star text-{{ $rating >= 3 ? 'yellow' : 'gray' }}-300"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)">
                                    <i class="fas fa-star text-{{ $rating >= 4 ? 'yellow' : 'gray' }}-300"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)">
                                    <i class="fas fa-star text-{{ $rating == 5 ? 'yellow' : 'gray' }}-300"></i>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                            <p>Usted ya ha valorado este curso</p>
                        </div>
                    @endcan
                </article>
            @endcan
            <div class="card">
                <div class="card-body">
                    <p class="text-gray-800 text-xl">{{ $course->reviews->count() }} valoraciones</p>
                    @foreach ($course->reviews as $review)
                        <article class="flex mb-4 text-gray-800">
                            <figure class="mr-4">
                                <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $review->user->profile_photo_url }}" alt="">
                            </figure>
                            <div class="card flex-1">
                                <div class="card-body bg-gray-100">
                                    <p><b>{{ $review->user->name }}</b> <i class="fas fa-star text-yellow-300"></i> ({{ $review->rating }})</p>
                                    {{ $review->comment }}
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
1. Modificar la vista **resources\views\courses\show.blade.php**:
    >
        ≡
            <section>
                <h1 class="font-bold text-3xl text-gray-800">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700">{{ $requirement->name }}</li>
                    @endforeach
                </ul>
            </section>
            <section>
                <h1 class="font-bold text-3xl text-gray-800">Descripción</h1>
                <div class="text-gray-700 text-base">
                    {!! $course->description !!}
                </div>
            </section>
            @livewire('courses-reviews', ['course' => $course])
        </div>
        ≡
1. Crear método **valued** en **app\Policies\CoursePolicy.php** para evitar que un usuario realice más de una reseña:
    >
        public function valued(User $user, Course $course){
            if(Review::where('user_id', $user->id)->where('course_id', $course->id)->count()){
                return false;
            }else{
                return true;
            }
        }
    Importar:
    >
        use App\Models\Review;


### Video 60. Descargar recursos
1. Modificar el método **status** del controlador **app\Http\Controllers\Instructor\CourseController.php**:
    >
        public function status(Course $course){
            $course->status = 2;
            $course->save();

            if($course->observation){
                $course->observation->delete();
            }

            return redirect()->route('instructor.courses.edit', $course);
        }
1. Modificar vista del componente livewire **resources\views\livewire\course-status.blade.php**:
    >
        ≡
        <div class="flex justify-between mt-4">
            {{-- MARCAR COMO CULMINADO --}}
            <div class="flex items-center cursor-pointer" wire:click="completed">
                @if ($current->completed)
                    <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                @else
                    <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                @endif
                <p class="text-sm ml-2">Marcar esta unidad como culminada</p>
            </div>
            @if ($current->resource)
                <div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
                    <i class="fas fa-download text-lg"></i>
                    <p class="text-sm ml-2">Descargar recurso</p>
                </div> 
            @endif
        </div>
        ≡
1. Crear método **download** en el controlador del componente livewire **app\Http\Livewire\CourseStatus.php**
    >
        public function download(){
            return response()->download(storage_path('app/public/' . $this->current->resource->url));
        }



## Sección 9: Metodo de pago


### Video 61. Parte visual
1. Modificar el componente **resources\views\components\course-card.blade.php**:
    >
        @props(['course'])

        <article class="card flex flex-col">
            <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
            <div class="card-body flex-1 flex flex-col">
                <h1 class="card-title">{{ Str::limit($course->title, 40) }}</h1>
                <p class="text-gray-500 text-sm mb-2 mt-auto">Prof. {{ $course->teacher->name }}</p>
                <div class="flex">
                    <ul class="flex text-sm">
                        <li class="mr-1">
                            <i class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li class="mr-1">
                            <i class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li class="mr-1">
                            <i class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li class="mr-1">
                            <i class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                        <li class="mr-1">
                            <i class="fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                        </li>
                    </ul>
                    <p class="text-sm text-gray-500 ml-auto">
                        <i class="fas fa-users"></i>
                        ({{ $course->students_count }})
                    </p>
                </div>
                @if ($course->price->value == 0)
                    <p class="my-2 text-green-700 font-bold">GRATIS</p>
                @else
                    <p class="my-2 text-gray-500 font-bold">US$ {{ $course->price->value }}</p>
                @endif
                <a href="{{ route('courses.show', $course) }}" class="btn btn-primary btn-block">
                    Mas información
                </a>
            </div>
        </article>
1. Modificar vista **resources\views\courses\show.blade.php**:
    >
        ≡
        @can('enrolled', $course)
            <a class="btn btn-danger btn-block mt-4" href="{{ route('courses.status', $course) }}">Continuar con curso</a>
        @else
            @if ($course->price->value == 0)
                <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">GRATIS</p>
                <form action="{{ route('courses.enrolled', $course) }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-block" type="submit">Llevar este curso</button>
                </form>
            @else
                <p class="text-2xl font-bold text-gray-500 mt-3 mb-2">US$ {{ $course->price->value }}</p>
                <a href="{{ route('payment.checkout', $course) }}" class="btn btn-danger btn-block">Comprar este curso</a>
            @endif
        @endcan
        ≡
1. Crear archivo de rutas **routes\payment.php**:
    >
        <?php

        use App\Http\Controllers\PaymentController;
        use Illuminate\Support\Facades\Route;

        Route::get('{course}/checkout',[PaymentController::class, 'checkout'])->name('checkout');
1. Modificar el método **boot** el provider **app\Providers\RouteServiceProvider.php** para que se reconozca **routes\payment.php** como archivo de rutas:
    >
        public function boot()
        {
            $this->configureRateLimiting();

            $this->routes(function () {
                Route::prefix('api')
                    ->middleware('api')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/api.php'));

                Route::middleware('web')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/web.php'));

                Route::middleware('web', 'auth')
                    ->name('admin.')
                    ->prefix('admin')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/admin.php'));

                Route::middleware('web', 'auth')
                    ->name('instructor.')
                    ->prefix('instructor')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/instructor.php'));

                Route::middleware('web', 'auth')
                    ->name('payment.')
                    ->prefix('payment')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/payment.php'));
            });
        }
1. Crear controlador para administrar los pagos:
    >
        php artisan make:controller PaymentController
1. Programar el controlador **app\Http\Controllers\PaymentController.php**:
    >
        <?php

        namespace App\Http\Controllers;

        use App\Models\Course;
        use Illuminate\Http\Request;

        class PaymentController extends Controller
        {
            public function checkout(Course $course){
                return view('payment.checkout', compact('course'));
            }
        }
1. Crear vista **resources\views\payment\checkout.blade.php**:
    >
        <x-app-layout>
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
                <h1 class="text-gray-500 text-3xl font-bold">Detalle del pedido</h1>
                <div class="card text-gray-600">
                    <div class="card-body">
                        <article class="flex items-center">
                            <img class="h-12 w-12 object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                            <h1 class="text-lg ml-2">{{ $course->title }}</h1>
                            <p class="text-xl font-bold ml-auto">US$ {{ $course->price->value }}</p>
                        </article>
                        <div class="flex justify-end mt-2 mb-4">
                            <a href="" class="btn btn-primary">Comprar este curso</a>
                        </div>
                        <hr>
                        <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, blanditiis labore, quam ea maxime provident minima quaerat possimus tempora corrupti, consectetur error esse delectus autem ab corporis eveniet sint molestiae?
                            <a class="text-red-500 font-bold" href="">Terminos y condiciones</a>
                        </p>
                    </div>
                </div>
            </div>
        </x-app-layout>


### Video 62. Gestionar pago
1. Crear cuenta de PayPal para empresas.
1. Ir a https://developer.paypal.com/classic-home, iniciar sesión e ir al Dashboard.
1. Dar clic en **SANDBOX > Accounts** (https://developer.paypal.com/developer/accounts/) para generar las siguientes cuentas ficticias:
    >
	    Account name	                        Type	    Country     Date created
        sb-6jp47b6555136@business.example.com   Business	VE	        19 Jun 2021     (Cuenta empresarial)
        sb-nqk47a6555696@personal.example.com   Personal	VE	        19 Jun 2021     (Cuenta personal)
1. Ir a https://sandbox.paypal.com e ingresar con la cuenta personal ficticia.
    + Nota: para obtener password de la cuenta personal ir a **View/edit account** (En **Manage accounts**) y cambiar el password por 12345678.
1. En https://developer.paypal.com/developer/accounts/ ir a **DASHBOARD > My Apps & Credentials** y luego dar clic en **Create App**.
1. Completar el formulario con la siguiente información:
    + App Name: CodersFree
    + Sandbox Business Account: sb-6jp47b6555136@business.example.com
1. Dar clic en **Create App** para obtener las siguientes credenciales:
    + Sandbox account: sb-6jp47b6555136@business.example.com
    + Client ID: ARXkrvWlwR0P3-Bu8UfKo2csv8Wa-7W6kNMP5TOWvX_W_baa5Bm18wuuUPEAsMf0e_PU5aMNACGgAQon
    + Secret: EPmmNZXEabxClPMHtIJaLAukamqgEHkLvmupjxfUxKSt_S_loD_mW12hu9QGcP3bpn6e-O0Tf0AVagaz
1. Agregar credenciales de **paypal** en el archivo de configuración **config\services.php**:
    >
        <?php

        return [
            ≡
            'paypal' => [
                'client_id' => env('PAYPAL_CLIENT_ID'),
                'client_secret' => env('PAYPAL_CLIENT_SECRET'),
            ],
        ];
1. Agregar credenciales de **paypal** en el archivo de variables de entorno **.env**:
    >
        ≡
        PAYPAL_CLIENT_ID=ARXkrvWlwR0P3-Bu8UfKo2csv8Wa-7W6kNMP5TOWvX_W_baa5Bm18wuuUPEAsMf0e_PU5aMNACGgAQon
        PAYPAL_CLIENT_SECRET=EPmmNZXEabxClPMHtIJaLAukamqgEHkLvmupjxfUxKSt_S_loD_mW12hu9QGcP3bpn6e-O0Tf0AVagaz
1. Crear ruta de pago en **routes\payment.php**:
    >
        Route::get('{course}/pay',[PaymentController::class, 'pay'])->name('pay');
1. Crear método **pay** en el controlador **app\Http\Controllers\PaymentController.php**:
    >
        public function pay(Course $course){
            // After Step 1
            $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    config('services.paypal.client_id'),     // ClientID
                    config('services.paypal.client_secret')      // ClientSecret
                )
            );

            // After Step 2
            $payer = new \PayPal\Api\Payer();
            $payer->setPaymentMethod('paypal');

            $amount = new \PayPal\Api\Amount();
            $amount->setTotal($course->price->value);
            $amount->setCurrency('USD');

            $transaction = new \PayPal\Api\Transaction();
            $transaction->setAmount($amount);

            $redirectUrls = new \PayPal\Api\RedirectUrls();
            $redirectUrls->setReturnUrl(route('payment.approved', $course))
                ->setCancelUrl(route('payment.checkout', $course));

            $payment = new \PayPal\Api\Payment();
            $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions(array($transaction))
                ->setRedirectUrls($redirectUrls);

            // After Step 3
            try {
                $payment->create($apiContext);
                
                return redirect()->away($payment->getApprovalLink());
            }
            catch (\PayPal\Exception\PayPalConnectionException $ex) {
                // This will print the detailed information on the exception.
                //REALLY HELPFUL FOR DEBUGGING
                echo $ex->getData();
            }
        }
1. Modificar vista **resources\views\payment\checkout.blade.php** para añadir ruta de pago:
    >
        <x-app-layout>
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
                <h1 class="text-gray-500 text-3xl font-bold">Detalle del pedido</h1>
                <div class="card text-gray-600">
                    <div class="card-body">
                        <article class="flex items-center">
                            <img class="h-12 w-12 object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
                            <h1 class="text-lg ml-2">{{ $course->title }}</h1>
                            <p class="text-xl font-bold ml-auto">US$ {{ $course->price->value }}</p>
                        </article>
                        <div class="flex justify-end mt-2 mb-4">
                            <a href="{{ route('payment.pay', $course) }}" class="btn btn-primary">Comprar este curso</a>
                        </div>
                        <hr>
                        <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, blanditiis labore, quam ea maxime provident minima quaerat possimus tempora corrupti, consectetur error esse delectus autem ab corporis eveniet sint molestiae?
                            <a class="text-red-500 font-bold" href="">Terminos y condiciones</a>
                        </p>
                    </div>
                </div>
            </div>
        </x-app-layout>
1. Ir a https://github.com/paypal/PayPal-PHP-SDK y:
    + Dar clic en la opción **Wiki** (https://github.com/paypal/PayPal-PHP-SDK/wiki).
    + Dar clic en **Installation > Composer** (https://github.com/paypal/PayPal-PHP-SDK/wiki/Installation-Composer) para obtener la sentencia de instalación de **Package paypal** ($ composer require paypal/rest-api-sdk-php:*).
    + Dar clic en **Making Your First Call** (https://github.com/paypal/PayPal-PHP-SDK/wiki/Making-First-Call) para obtener el modelo de las credenciales a copiar en el método **pay** del controlador **app\Http\Controllers\PaymentController.php**. 
1. Instalar **Package paypal**:
    >
        $ composer require paypal/rest-api-sdk-php:*
1. Crear ruta de aprobación del pago en **routes\payment.php**:
    >
        Route::get('{course}/approved',[PaymentController::class, 'approved'])->name('approved');
1. Crear método **approved** en el controlador **app\Http\Controllers\PaymentController.php**:
    >
        public function approved(Request $request, Course $course){
            // After Step 1
            $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    config('services.paypal.client_id'),     // ClientID
                    config('services.paypal.client_secret')      // ClientSecret
                )
            );

            $paymentId = $_GET['paymentId'];
            $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

            $execution = new \PayPal\Api\PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);

            $payment->execute($execution, $apiContext);

            // Matricula al usuario en el curso
            $course->students()->attach(auth()->user()->id);
            return redirect()->route('courses.status', $course);
        }
    Ir a https://github.com/paypal/PayPal-PHP-SDK/blob/master/sample/payments/ExecutePayment.php para obtener código para procesar pago
1. Nota: Cuando se crea una aplicación en **paypal developer** se tiene que tener en cuenta:
    + Sendbox: para desarrollo.
    + Live: para producción.
********* FIN


## Para limpiar configuración y reestablecer el cache:
+ $ php artisan config:clear
+ $ php artisan config:cache 

## En caso de no permitir compilar algo:
+ $ php artisan clear-compiled
+ $ composer dumpautoload

## Deploy del proyecto en Heroku para pruebas
1. Crear en la raíz del proyecto el archivo **Procfile** (sin extensión) para elegir un servidor apache en Heroku y también indicarle la ubicación del archivo incial index.php:
    ```
    web: vendor/bin/heroku-php-apache2 public/
    ```
2. Ingresar a [Heroku](https://dashboard.heroku.com/apps) e ir a **Dashboard**.
3. Crear un nuevo proyecto en **New > Create new app**
    + Nombre: cursos-sefar
4. Ir a **Deploy** y dar clic en **GitHub**.
5. Clic en el botón **Connect to GitHub** e ingresar las credenciales.
6. Seleccionar el repositorio **cursos_sefar** y presionar el botón **Connect**.
7. Para tener siempre la ultima actualización de nuestro proyecto se recomienda presionar el botón **Enable Automatic Deploys**.
8. Seleccionar el branch **main** y presionar el botón **Deploy Branch**.
9. Descargar e instalar [Heroku CLI](https://devcenter.heroku.com/articles/heroku-cli).
10. En la terminal en la raíz del proyecto en local e iniciar sesión en Heroku:
    + $ heroku login
11. Víncular con la aplicación de Heroku **paymet**:
    + $ git remote add heroku git.heroku.com/cursos-sefar.git
        + (git remote set-url Origin git.heroku.com/cursos-sefar.git)
    + $ heroku git:remote -a cursos-sefar
12. Registrar variables de entorno de la aplicación desde la terminal:
    + $ heroku config:add APP_NAME="Plataforma de Cursos Sefar"
    + $ heroku config:add APP_ENV=production
    + $ heroku config:add APP_KEY=base64:7+xjR4WKXqdpQdmx1C4kudxVqWx5WgUVcuKoOPQ//Ug=
    + $ heroku config:add APP_DEBUG=false
    + $ heroku config:add APP_URL=https://cursos-sefar.herokuapp.com
13. Crear base de datos Postgre SQL desde la terminal:
    + $ heroku addons:create heroku-postgresql:hobby-dev
    + $ heroku pg:credentials:url
    + **Nota**: la salida de la última línea de comando nos servirá para configurar las variables de entorno de la base de datos:
    ```
    Connection information for default credential.
    Connection info string:
    "dbname=*** host=*** port=*** user=*** password=*** sslmode=require"
    Connection URL:
    postgres://mmtmzssdyxkfyt:9336263e704b06d0a1ba7c979c426e7d8eb77f3958e4114cea9a21973ba08d84@ec2-35-168-145-180.compute-1.amazonaws.com:5432/dbhkpp3vfen6vd
    ```
14. Registrar variables de entorno de la base de datos desde la terminal:
    + $ heroku config:add DB_CONNECTION=pgsql
    + $ heroku config:add DB_HOST={host}
    + $ heroku config:add DB_PORT={port}
    + $ heroku config:add DB_DATABASE={dbname}
    + $ heroku config:add DB_USERNAME={user}
    + $ heroku config:add DB_PASSWORD={password}
15. Ejecutar migraciones:
    + $ heroku run bash
    + ~ $ php artisan migrate --seed
        + Do you really wish to run this command? (yes/no) [no]: **yes**
    + ~ $ exit
16. Salir de Heroku:
    + $ heroku logout