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
            'title'     => 'Chapingo y gobierno de Oaxaca firman carta de intenci??n para colaborar en temas de agricultura',
            'slug'      => Str::slug('Chapingo y gobierno de Oaxaca firman carta de intenci??n para colaborar en temas de agricultura'),
            'image'     => 'image.jpg',
            'subtitle'  => 'Chapingo podria colaborar con el gobierno de oaxaca',
            'body'      => '<p>El rector de la Universidad Aut??noma Chapingo, doctor Jos?? Sol??s Ram??rez recibi?? a los Subsecretarios de Agronegocios y Organizaci??n, ingeniero Felipe Orozco Rodas y al ingeniero Lino Vel??zquez Morales de Planeaci??n para el Desarrollo Rural Sustentable, dependencias de la Secretar??a de Desarrollo Agropecuario, Pesca y Agricultura (SEDAPA) del gobierno de Oaxaca para firmar una Carta de Intenci??n para realizar un convenio de colaboraci??n en temas de trasferencia de tecnolog??a, asesoramiento t??cnico en temas de agricultura como caf??, entre otros temas que permitan potenciar el campo oaxaque??o. 

            Durante la reuni??n, celebrada en la Sala de Directores, el rector explic?? a los presentes el perfil agron??mico de la Universidad Aut??noma Chapingo y de la excelencia acad??mica de sus licenciaturas y posgrados, exaltando el perfil acad??mico y t??cnico de los egresados para impulsar el campo mexicano. 

            Destac?? la formaci??n de los estudiantes provenientes del estado de Oaxaca, y de la importancia de que al egresar, regresen a sus zonas de origen para detonar cambios en el campo mexicano, por ello, destac?? el trabajo que realiza la Red Nacional de Huertos Chapingo, en donde se tienen a estudiantes trabajando con sus comunidades, para la generaci??n de alimentos como son las hortalizas. 

            Subray?? que para la Universidad Aut??noma Chapingo la importancia la vinculaci??n que se establece con campesinos, productores, organizaciones y gobiernos municipal, estatal y federal son de suma importancia para demostrar la capacidad de los estudiantes y egresados para el desarrollo del campo mexicano. 

            El ingeniero Lino Vel??zquez Morales, subsecretario de Planeaci??n para el Desarrollo Rural Sustentable, de la SEDAPA, coment?? la importancia que tiene para el gobierno de Oaxaca establecer una colaboraci??n con la Universidad Aut??noma Chapingo, principalmente para el asesoramiento y ejecuci??n de los programas agropecuarios que se tienen en el gobierno de Oaxaca, a trav??s de la dependencia estatal.  

            En la reuni??n estuvieron presentes el ingeniero Josefat Cuevas Bernardino; director de organizaci??n y capacitaci??n para la producci??n; licenciado Daniel Rojas Garc??a, en representaci??n del doctor Antonio Nogal Jim??nez, presidente municipal electo de Pinotepa; licenciada Mar??a Fernanda Barbosa Sosa, presidenta electa de San Felipe Jalapa de D??az; su asesora licenciada Gabriela Melina Lira Leal; as?? como el director general de Investigaci??n y Posgrado de la UACh, doctor Arturo Hern??ndez Montes; y el secretario particular de Rector??a, doctor ??ngel Leyva Ovalle.</p>',

            'publish'   => 1,

        ]);

        Notice::create([
            'user_id'   => 3,
            'title'     => 'Inaugura rector obras de rehabilitaci??n en Chapingo',
            'slug'      => Str::slug('Inaugura rector obras de rehabilitaci??n en Chapingo'),
            'image'     => 'image1.jpg',
            'subtitle'  => 'Nuevas instalaciones de chapingo',
            'body'      => '<p>El rector de la Universidad Aut??noma Chapingo, doctor Jos?? Sol??s Ram??rez inaugur?? la primera etapa del perif??rico universitario, estacionamientos, cambios de sanitarios, pisos, pinturas en barandales, escaleras, cambio de pisos en balcones, entre otros trabajos que se ejecutaron en los dormitorios como son las ??reas comunes, as?? como la instalaci??n de c??maras de video-vigilancia, acci??n que busca reforzar la seguridad universitaria; obras de rehabilitaci??n que la administraci??n central realiz?? durante este tiempo en que las actividades de la instituci??n se han visto modificadas por la contingencia sanitaria del Covid-19. 

            Al dar su mensaje en el evento de la inauguraci??n de obras, el rector destac?? que la coordinaci??n entre las unidades de la administraci??n central y de centros regionales permiti?? trabajar en la imagen institucional, mediante la rehabilitaci??n de la infraestructura universitaria.   

            En relaci??n al perif??rico universitario explic?? que por m??s de 25 a??os, al circuito no se le hab??a dado mantenimiento alguno, por lo que el cambio de asfalto, ahora de cemento hidr??ulico, permiti?? tambi??n destinar un espacio espec??fico para una ciclo v??a: ???Esta obra tiene tambi??n la finalidad de evitar que se estacionen sobre la v??a, se trabaja en un reglamento interno de vialidad, por ello, en esta primera etapa se han rehabilitado los estacionamientos; y en la segunda etapa, se tiene planeado hacer un estacionamiento nuevo y dar mantenimiento a los que hacen falta???.  

            Refiri?? que la seguridad universitaria es esencial para la comunidad universitaria, as?? como para los trabajadores administrativos, por lo que la administraci??n central logr?? establecer el C-4,  con video-vigilancia en todo el campus central, y en campo de San Ignacio; y aclar?? que se va a extender a toda la zona de campos experimentales. 

            Asimismo, el doctor Sol??s Ram??rez hizo un reconocimiento especial a los trabajadores de vigilancia, quienes en este tiempo de pandemia, quienes han trabajado en el sistema de seguridad integral, capacitaci??n, elaboraci??n de protocolos, con la finalidad de brindar seguridad al interior de la universidad. A??adi?? que se rehabilitaron algunas unidades de transporte, las cuales fueron destinadas al ??rea de vigilancia para que dar respuesta inmediata. 

            Coment?? que la administraci??n central, a trav??s de Patronato Universitario se adquiri?? 11 autobuses, los cuales estar??n destinados a los viajes de estudio, toda vez que la comunidad estudiantil regrese al campus: ???Aun no tenemos una fecha exacta del  regreso a clases, pero se est?? trabajando para ??ste sea seguro, con responsabilidad, tomando las medidas sanitarias para evitar brotes de contagio, porque aunque se est?? vacunado hay riesgos???. 

            Durante el recorrido de la inauguraci??n de obras estuvo presente el licenciado Enrique Garc??a L??pez, representante del doctor Luis Hern??ndez Palacios Mir??n, Procurador Agrario, as?? como los directores generales Acad??mica, Investigaci??n y Servicio, Administraci??n, doctores Gloria Humberta Calyecac Cortero, Arturo Hern??ndez Montes, qu??mica Hilda Flores Brito; y de Patronato Universitario, maestro Buenaventura Reyes Chac??n, as?? como directores de DEIS y jefes de departamento.</p>',

            'publish'   => 1,

        ]);

        Notice::create([
            'user_id'   => 5,
            'title'     => 'Firma rector convenio de colaboraci??n con Agroscout y Agronerubi',
            'slug'      => Str::slug('Firma rector convenio de colaboraci??n con Agroscout y Agronerubi'),
            'image'     => 'image2.jpg',
            'subtitle'  => 'Nuevo convenio de chapingo',
            'body'      => '<p>Con la finalidad de establecer acciones que permitan el desarrollo acad??mico, cient??fico, tecnol??gico, as?? como una vinculaci??n entre la Universidad Aut??noma Chapingo y la iniciativa privada, el rector de esta instituci??n educativa, doctor Jos?? Sol??s Ram??rez, firm?? un convenio general de colaboraci??n con Agroscout y Agronerubi, quienes buscan establecer programas de trabajo espec??ficos, cuyo impacto sea mejorar el campo mexicano y la reivindicaci??n de los agr??nomos. 

            Momentos antes de firmar el convenio, la ingeniera Yolanda Neri L??pez, gerente de Agronerubi asegur?? que esta colaboraci??n representa un paso firme en beneficio del agro mexicano, as?? como para resaltar la importancia de los agr??nomos: ???Adem??s de preponderar a la Universidad Aut??noma Chapingo que siempre ha estado, est?? y debe seguir estando en el desarrollo del campo???. 

            En su oportunidad, el rector, doctor Jos?? Sol??s Ram??rez dio la bienvenida virtualmente al Sr. Simcha Eliyahu Shore, director general de Agroscout y coment?? la importancia de establecer convenios para aportar los conocimientos al desarrollo del campo mexicano. 

            Durante la firma del convenio, celebrada en las instalaciones del Museo Nacional de Agricultura, estuvo presente el doctor ??ngel Leyva Ovalle, secretario particular de la Rector??a, quien colaborar?? en el grupo de trabajo entre las empresas y la universidad, con el objetivo de trabajar los convenios espec??ficos.</p>',

            'publish'   => 1,

        ]);

        Notice::create([
            'user_id'   => 2,
            'title'     => 'Realizar?? Chapingo 8?? Feria Universitaria del Empleo, edici??n virtual',
            'slug'      => Str::slug('Realizar?? Chapingo 8?? Feria Universitaria del Empleo, edici??n virtual'),
            'image'     => 'image3.jpg',
            'subtitle'  => 'Se realizar?? los d??as 20, 21 y 22 de octubre del 2022',
            'body'      => '<p>Con la finalidad de ofrecer a los estudiantes, pr??ximos a egresar, as?? como a los egresados que a??n no han podido insertarse en el campo laboral, la Universidad Aut??noma Chapingo llevar?? a cabo la 8?? Feria Universitaria del Empleo Chapingo 2021, Edici??n Virtual, en donde se espera ofertar poco m??s de 400 vacantes, que ofrecen empresas nacionales y extranjeras de corte agropecuario.

            El ??rea de Bolsa de Trabajo, perteneciente al Departamento de Relaciones P??blicas, ha convocado a las empresas con las que se ha trabajado en ediciones anteriores, para ofrecer a los estudiantes y egresados una fuente de empleo, de acuerdo a su perfil profesional. La 8?? Feria Universitaria del Empleo Chapingo 2021, Edici??n Virtual, se llevar?? a cabo los d??as 20, 21 y 22 de octubre.

            Entre las 45 empresas e instituciones participantes en este evento virtual destacan, el Servicio Nacional de Sanidad, Inocuidad y Calidad Agroalimentaria (SENASICA), Fideicomisos Instituidos en Relaci??n con la Agricultura (FIRA),  el Centro Internacional de Mejoramiento de Ma??z y Trigo (CIMMYT), Servicio Nacional de Empleo, Basf, Cosmocel, Bachoco, Fresh Kampo, Latimex, Sifatec, INyDES, Agribest, Empresas Drag??n, Agromotriz, Ourofino Salud Animal, Granjas Ojai, entre otras.

            Los ofertantes se encuentran en los estados de Guanajuato, Hidalgo, Ciudad de M??xico, Jalisco, Michoac??n, Nuevo Le??n, Estado de M??xico, Oaxaca, Puebla, Quer??taro, Sinaloa, Veracruz, Sonora y Coahuila, principalmente; as?? como en Estados Unidos.

            Dentro de las actividades virtuales del evento, los alumnos que no han realizado su estancia pre profesional, podr??n tambi??n consultar las oportunidades para realizarlas, con la ventaja de luego quedarse a laborar en la empresa que ofrece esta oportunidad, con un sueldo de 8 mil pesos mensuales.

            Los salarios que ofrecen las empresas participantes en este evento virtual oscilan entre los 10 mil y 62 mil pesos mensuales, por lo que los estudiantes pr??ximos a egresar, as?? como los ex alumnos de la instituci??n, interesados en encontrar una fuente de empleo deber??n ingresar a la direcci??n electr??nica http://cidiomas.chapingo.mx/bolsadetrabajoregistro/, a partir de las 9 de la ma??ana los d??as en que se desarrolla la feria del empleo, ah?? podr??n consultar y aplicar a las vacantes de su inter??s.

            Asimismo, podr??n  ver y escuchar las pl??ticas en relaci??n a la elaboraci??n de CV, entrevistas de empleo, b??squeda de empleo, mercado laboral, entre otros temas de importancia para quienes se van insertando en el ??mbito profesional.

            Es importante comentar que en esta edici??n virtual de la Feria Universitaria del Empleo, se ofertan un n??mero menor de vacantes, en comparaci??n con ediciones anteriores, esto como consecuencia de los estragos generados por la pandemia del Covid-19, dado que un n??mero considerable de empresas se vio en la necesidad de cerrar sus instalaciones, o bien, tuvieron que recortar su planta laboral.</p>',

            'publish'   => 1,

        ]);

        Notice::create([
            'user_id'   => 4,
            'title'     => 'Supervisa rector avance de obras de remodelaci??n en el internado',
            'slug'      => Str::slug('Supervisa rector avance de obras de remodelaci??n en el internado'),
            'image'     => 'image4.jpg',
            'subtitle'  => null,
            'body'      => '<p>El rector, doctor Jos?? Sol??s Ram??rez realiz?? un recorrido por los internados para verificar el avance que presentan los trabajos de remodelaci??n  que se llevan a cabo en esta zona de la instituci??n, por lo que estuvo acompa??ado por autoridades de la administraci??n central y de las ??reas competentes involucradas en las obras que se ejecutan. 

            Durante el recorrido, se inform?? de la remodelaci??n de las terrazas de los dormitorios, as?? como el cambio de sanitarios, pisos, espejos, puertas, plafones, l??mparas, entre otros que representan la rehabilitaci??n de los sanitarios y dormitorios de los alumnos. 

            Tras verificar los avances significativos que presenta el Dormitorio 11, el doctor Sol??s Ram??rez destac?? que esta zona de la Universidad Aut??noma Chapingo, ya cuenta con instalaci??n  c??maras de vigilancia, las cuales permiten  monitorear en tiempo real: ???Toda vez que los alumnos regresen, contar??n con mayor vigilancia, todo esto para su seguridad y bienestar dentro de las instalaciones de nuestra Alma Mater???. 

            Al iniciar el recorrido de supervisi??n de obras, el rector asegur?? que la pandemia, que representa afectaciones en diversos sentidos para la comunidad universitaria, tambi??n represent?? la oportunidad para insertarse en la impartici??n de educaci??n a distancia, aprender sobre el uso de nuevas tecnolog??as; en tanto que para la administraci??n  central represent?? tambi??n la oportunidad de ejecutar obras de remodelaci??n, rehabilitaci??n y de conservaci??n en todas las instalaciones de la Universidad Aut??noma Chapingo. .</p>',

            'publish'   => 1,

        ]);

    }
}
