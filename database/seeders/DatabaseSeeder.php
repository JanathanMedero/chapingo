<?php

namespace Database\Seeders;

use App\Models\Notice;
use App\Models\User;
use DB;
use Database\Seeders\RoleSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
        ]);

        // \App\Models\User::factory(100)->create();

        User::create([
            'name'      => 'Janathan Medero Pineda',
            'slug'      =>  Str::slug('Janathan Medero Pineda'),
            'email'     => 'webmaster@pyscom.com',
            'password'  => Hash::make('webmaster.pyscom2021'),
        ])->assignRole('administrator');

        User::create([
            'name'      => 'Johan Doe Silver',
            'slug'      =>  Str::slug('Johan Doe Silver'),
            'email'     => 'johan@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('administrator');

        User::create([
            'name'      => 'John Doe',
            'slug'      =>  Str::slug('John Doe'),
            'email'     => 'john@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('moderator');

        User::create([
            'name'      => 'Christina Maths Loe',
            'slug'      =>  Str::slug('Christina Maths Loe'),
            'email'     => 'christina@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('moderator');

        User::create([
            'name'      => 'Wilson Thomas Doe',
            'slug'      =>  Str::slug('Wilson Thomas Doe'),
            'email'     => 'wilson@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('moderator');

        User::create([
            'name'      => 'Luisa Yohan Doe',
            'slug'      =>  Str::slug('Luisa Yohan Doe'),
            'email'     => 'luisa@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('redactor');

        User::create([
            'name'      => 'Cloe Dischannel',
            'slug'      =>  Str::slug('Cloe Dischannel'),
            'email'     => 'cloe@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('redactor');

        User::create([
            'name'      => 'Marco Olivares Doe',
            'slug'      =>  Str::slug('Marco Olivares Doe'),
            'email'     => 'Marco@pyscom.com',
            'password'  => Hash::make('admin'),
        ])->assignRole('redactor');

        Notice::create([
            'user_id'   => 1,
            'title'     => 'Chapingo y gobierno de Oaxaca firman carta de intención para colaborar en temas de agricultura',
            'slug'      => Str::slug('Chapingo y gobierno de Oaxaca firman carta de intención para colaborar en temas de agricultura'),
            'image'     => 'image.jpg',
            'subtitle'  => 'Chapingo podria colaborar con el gobierno de oaxaca',
            'body'      => '<p>El rector de la Universidad Autónoma Chapingo, doctor José Solís Ramírez recibió a los Subsecretarios de Agronegocios y Organización, ingeniero Felipe Orozco Rodas y al ingeniero Lino Velázquez Morales de Planeación para el Desarrollo Rural Sustentable, dependencias de la Secretaría de Desarrollo Agropecuario, Pesca y Agricultura (SEDAPA) del gobierno de Oaxaca para firmar una Carta de Intención para realizar un convenio de colaboración en temas de trasferencia de tecnología, asesoramiento técnico en temas de agricultura como café, entre otros temas que permitan potenciar el campo oaxaqueño. 

            Durante la reunión, celebrada en la Sala de Directores, el rector explicó a los presentes el perfil agronómico de la Universidad Autónoma Chapingo y de la excelencia académica de sus licenciaturas y posgrados, exaltando el perfil académico y técnico de los egresados para impulsar el campo mexicano. 

            Destacó la formación de los estudiantes provenientes del estado de Oaxaca, y de la importancia de que al egresar, regresen a sus zonas de origen para detonar cambios en el campo mexicano, por ello, destacó el trabajo que realiza la Red Nacional de Huertos Chapingo, en donde se tienen a estudiantes trabajando con sus comunidades, para la generación de alimentos como son las hortalizas. 

            Subrayó que para la Universidad Autónoma Chapingo la importancia la vinculación que se establece con campesinos, productores, organizaciones y gobiernos municipal, estatal y federal son de suma importancia para demostrar la capacidad de los estudiantes y egresados para el desarrollo del campo mexicano. 

            El ingeniero Lino Velázquez Morales, subsecretario de Planeación para el Desarrollo Rural Sustentable, de la SEDAPA, comentó la importancia que tiene para el gobierno de Oaxaca establecer una colaboración con la Universidad Autónoma Chapingo, principalmente para el asesoramiento y ejecución de los programas agropecuarios que se tienen en el gobierno de Oaxaca, a través de la dependencia estatal.  

            En la reunión estuvieron presentes el ingeniero Josefat Cuevas Bernardino; director de organización y capacitación para la producción; licenciado Daniel Rojas García, en representación del doctor Antonio Nogal Jiménez, presidente municipal electo de Pinotepa; licenciada María Fernanda Barbosa Sosa, presidenta electa de San Felipe Jalapa de Díaz; su asesora licenciada Gabriela Melina Lira Leal; así como el director general de Investigación y Posgrado de la UACh, doctor Arturo Hernández Montes; y el secretario particular de Rectoría, doctor Ángel Leyva Ovalle.</p>',

            'publish'   => 1,

        ]);

        Notice::create([
            'user_id'   => 3,
            'title'     => 'Inaugura rector obras de rehabilitación en Chapingo',
            'slug'      => Str::slug('Inaugura rector obras de rehabilitación en Chapingo'),
            'image'     => 'image1.jpg',
            'subtitle'  => 'Nuevas instalaciones de chapingo',
            'body'      => '<p>El rector de la Universidad Autónoma Chapingo, doctor José Solís Ramírez inauguró la primera etapa del periférico universitario, estacionamientos, cambios de sanitarios, pisos, pinturas en barandales, escaleras, cambio de pisos en balcones, entre otros trabajos que se ejecutaron en los dormitorios como son las áreas comunes, así como la instalación de cámaras de video-vigilancia, acción que busca reforzar la seguridad universitaria; obras de rehabilitación que la administración central realizó durante este tiempo en que las actividades de la institución se han visto modificadas por la contingencia sanitaria del Covid-19. 

            Al dar su mensaje en el evento de la inauguración de obras, el rector destacó que la coordinación entre las unidades de la administración central y de centros regionales permitió trabajar en la imagen institucional, mediante la rehabilitación de la infraestructura universitaria.   

            En relación al periférico universitario explicó que por más de 25 años, al circuito no se le había dado mantenimiento alguno, por lo que el cambio de asfalto, ahora de cemento hidráulico, permitió también destinar un espacio específico para una ciclo vía: “Esta obra tiene también la finalidad de evitar que se estacionen sobre la vía, se trabaja en un reglamento interno de vialidad, por ello, en esta primera etapa se han rehabilitado los estacionamientos; y en la segunda etapa, se tiene planeado hacer un estacionamiento nuevo y dar mantenimiento a los que hacen falta”.  

            Refirió que la seguridad universitaria es esencial para la comunidad universitaria, así como para los trabajadores administrativos, por lo que la administración central logró establecer el C-4,  con video-vigilancia en todo el campus central, y en campo de San Ignacio; y aclaró que se va a extender a toda la zona de campos experimentales. 

            Asimismo, el doctor Solís Ramírez hizo un reconocimiento especial a los trabajadores de vigilancia, quienes en este tiempo de pandemia, quienes han trabajado en el sistema de seguridad integral, capacitación, elaboración de protocolos, con la finalidad de brindar seguridad al interior de la universidad. Añadió que se rehabilitaron algunas unidades de transporte, las cuales fueron destinadas al área de vigilancia para que dar respuesta inmediata. 

            Comentó que la administración central, a través de Patronato Universitario se adquirió 11 autobuses, los cuales estarán destinados a los viajes de estudio, toda vez que la comunidad estudiantil regrese al campus: “Aun no tenemos una fecha exacta del  regreso a clases, pero se está trabajando para éste sea seguro, con responsabilidad, tomando las medidas sanitarias para evitar brotes de contagio, porque aunque se esté vacunado hay riesgos”. 

            Durante el recorrido de la inauguración de obras estuvo presente el licenciado Enrique García López, representante del doctor Luis Hernández Palacios Mirón, Procurador Agrario, así como los directores generales Académica, Investigación y Servicio, Administración, doctores Gloria Humberta Calyecac Cortero, Arturo Hernández Montes, química Hilda Flores Brito; y de Patronato Universitario, maestro Buenaventura Reyes Chacón, así como directores de DEIS y jefes de departamento.</p>',

            'publish'   => 1,

        ]);

        Notice::create([
            'user_id'   => 5,
            'title'     => 'Firma rector convenio de colaboración con Agroscout y Agronerubi',
            'slug'      => Str::slug('Firma rector convenio de colaboración con Agroscout y Agronerubi'),
            'image'     => 'image2.jpg',
            'subtitle'  => 'Nuevo convenio de chapingo',
            'body'      => '<p>Con la finalidad de establecer acciones que permitan el desarrollo académico, científico, tecnológico, así como una vinculación entre la Universidad Autónoma Chapingo y la iniciativa privada, el rector de esta institución educativa, doctor José Solís Ramírez, firmó un convenio general de colaboración con Agroscout y Agronerubi, quienes buscan establecer programas de trabajo específicos, cuyo impacto sea mejorar el campo mexicano y la reivindicación de los agrónomos. 

            Momentos antes de firmar el convenio, la ingeniera Yolanda Neri López, gerente de Agronerubi aseguró que esta colaboración representa un paso firme en beneficio del agro mexicano, así como para resaltar la importancia de los agrónomos: “Además de preponderar a la Universidad Autónoma Chapingo que siempre ha estado, está y debe seguir estando en el desarrollo del campo”. 

            En su oportunidad, el rector, doctor José Solís Ramírez dio la bienvenida virtualmente al Sr. Simcha Eliyahu Shore, director general de Agroscout y comentó la importancia de establecer convenios para aportar los conocimientos al desarrollo del campo mexicano. 

            Durante la firma del convenio, celebrada en las instalaciones del Museo Nacional de Agricultura, estuvo presente el doctor Ángel Leyva Ovalle, secretario particular de la Rectoría, quien colaborará en el grupo de trabajo entre las empresas y la universidad, con el objetivo de trabajar los convenios específicos.</p>',

            'publish'   => 1,

        ]);

        Notice::create([
            'user_id'   => 2,
            'title'     => 'Realizará Chapingo 8ª Feria Universitaria del Empleo, edición virtual',
            'slug'      => Str::slug('Realizará Chapingo 8ª Feria Universitaria del Empleo, edición virtual'),
            'image'     => 'image3.jpg',
            'subtitle'  => 'Se realizará los días 20, 21 y 22 de octubre del 2022',
            'body'      => '<p>Con la finalidad de ofrecer a los estudiantes, próximos a egresar, así como a los egresados que aún no han podido insertarse en el campo laboral, la Universidad Autónoma Chapingo llevará a cabo la 8ª Feria Universitaria del Empleo Chapingo 2021, Edición Virtual, en donde se espera ofertar poco más de 400 vacantes, que ofrecen empresas nacionales y extranjeras de corte agropecuario.

            El área de Bolsa de Trabajo, perteneciente al Departamento de Relaciones Públicas, ha convocado a las empresas con las que se ha trabajado en ediciones anteriores, para ofrecer a los estudiantes y egresados una fuente de empleo, de acuerdo a su perfil profesional. La 8ª Feria Universitaria del Empleo Chapingo 2021, Edición Virtual, se llevará a cabo los días 20, 21 y 22 de octubre.

            Entre las 45 empresas e instituciones participantes en este evento virtual destacan, el Servicio Nacional de Sanidad, Inocuidad y Calidad Agroalimentaria (SENASICA), Fideicomisos Instituidos en Relación con la Agricultura (FIRA),  el Centro Internacional de Mejoramiento de Maíz y Trigo (CIMMYT), Servicio Nacional de Empleo, Basf, Cosmocel, Bachoco, Fresh Kampo, Latimex, Sifatec, INyDES, Agribest, Empresas Dragón, Agromotriz, Ourofino Salud Animal, Granjas Ojai, entre otras.

            Los ofertantes se encuentran en los estados de Guanajuato, Hidalgo, Ciudad de México, Jalisco, Michoacán, Nuevo León, Estado de México, Oaxaca, Puebla, Querétaro, Sinaloa, Veracruz, Sonora y Coahuila, principalmente; así como en Estados Unidos.

            Dentro de las actividades virtuales del evento, los alumnos que no han realizado su estancia pre profesional, podrán también consultar las oportunidades para realizarlas, con la ventaja de luego quedarse a laborar en la empresa que ofrece esta oportunidad, con un sueldo de 8 mil pesos mensuales.

            Los salarios que ofrecen las empresas participantes en este evento virtual oscilan entre los 10 mil y 62 mil pesos mensuales, por lo que los estudiantes próximos a egresar, así como los ex alumnos de la institución, interesados en encontrar una fuente de empleo deberán ingresar a la dirección electrónica http://cidiomas.chapingo.mx/bolsadetrabajoregistro/, a partir de las 9 de la mañana los días en que se desarrolla la feria del empleo, ahí podrán consultar y aplicar a las vacantes de su interés.

            Asimismo, podrán  ver y escuchar las pláticas en relación a la elaboración de CV, entrevistas de empleo, búsqueda de empleo, mercado laboral, entre otros temas de importancia para quienes se van insertando en el ámbito profesional.

            Es importante comentar que en esta edición virtual de la Feria Universitaria del Empleo, se ofertan un número menor de vacantes, en comparación con ediciones anteriores, esto como consecuencia de los estragos generados por la pandemia del Covid-19, dado que un número considerable de empresas se vio en la necesidad de cerrar sus instalaciones, o bien, tuvieron que recortar su planta laboral.</p>',

            'publish'   => 1,

        ]);

        Notice::create([
            'user_id'   => 4,
            'title'     => 'Supervisa rector avance de obras de remodelación en el internado',
            'slug'      => Str::slug('Supervisa rector avance de obras de remodelación en el internado'),
            'image'     => 'image4.jpg',
            'subtitle'  => null,
            'body'      => '<p>El rector, doctor José Solís Ramírez realizó un recorrido por los internados para verificar el avance que presentan los trabajos de remodelación  que se llevan a cabo en esta zona de la institución, por lo que estuvo acompañado por autoridades de la administración central y de las áreas competentes involucradas en las obras que se ejecutan. 

            Durante el recorrido, se informó de la remodelación de las terrazas de los dormitorios, así como el cambio de sanitarios, pisos, espejos, puertas, plafones, lámparas, entre otros que representan la rehabilitación de los sanitarios y dormitorios de los alumnos. 

            Tras verificar los avances significativos que presenta el Dormitorio 11, el doctor Solís Ramírez destacó que esta zona de la Universidad Autónoma Chapingo, ya cuenta con instalación  cámaras de vigilancia, las cuales permiten  monitorear en tiempo real: “Toda vez que los alumnos regresen, contarán con mayor vigilancia, todo esto para su seguridad y bienestar dentro de las instalaciones de nuestra Alma Mater”. 

            Al iniciar el recorrido de supervisión de obras, el rector aseguró que la pandemia, que representa afectaciones en diversos sentidos para la comunidad universitaria, también representó la oportunidad para insertarse en la impartición de educación a distancia, aprender sobre el uso de nuevas tecnologías; en tanto que para la administración  central representó también la oportunidad de ejecutar obras de remodelación, rehabilitación y de conservación en todas las instalaciones de la Universidad Autónoma Chapingo. .</p>',

            'publish'   => 1,

        ]);

    }
}
