<?php

use Illuminate\Database\Seeder;
use App\GoldMember;

class GoldMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GoldMember::create([
            'full_name' => 'Charlie Perry',
            'email' => 'test1@mail.com',
            'contact_number' => '09428581126',
            'serial_number' => 'ADMINAAA-0001',
            'referred_by' => '',
            'income' => 12000,
            'parent_node' => 'head',
            'left_node' => '2',
            'right_node' => '3'     
        ]);

        GoldMember::create([
            'full_name' => 'Rosie Chavez',
            'email' => 'test2@mail.com',
            'contact_number' => '09195295571',
            'serial_number' => 'ADMINAAA-0002',
            'referred_by' => '',
            'income' => 10000,
            'parent_node' => '1',
            'left_node' => '4',
            'right_node' => '5'     
        ]);

        GoldMember::create([
            'full_name' => 'Stanley Mendoza',
            'email' => 'test3@mail.com',
            'contact_number' => '09607530236',
            'serial_number' => 'ADMINAAA-0003',
            'referred_by' => 'test1@mail.com',
            'income' => 5000,
            'parent_node' => '1',
            'left_node' => '6',
            'right_node' => '7'     
        ]);

        GoldMember::create([
            'full_name' => 'Brandon Vasquez',
            'email' => 'test1@mail.com',
            'contact_number' => '09349524247',
            'serial_number' => 'ADMINAAA-0004',
            'referred_by' => 'test1@mail.com',
            'income' => 5000,
            'parent_node' => '2',
            'left_node' => '8',
            'right_node' => '9'     
        ]);

        GoldMember::create([
            'full_name' => 'Iona Turner',
            'email' => 'test5@mail.com',
            'contact_number' => '09917747965',
            'serial_number' => 'ADMINAAA-0005',
            'referred_by' => 'test4@mail.com',
            'income' => 5000,
            'parent_node' => '2',
            'left_node' => '10',
            'right_node' => '11'     
        ]);

        GoldMember::create([
            'full_name' => 'Marco Clark',
            'email' => 'test6@mail.com',
            'contact_number' => '09286257153',
            'serial_number' => 'ADMINAAA-0006',
            'referred_by' => 'test2@mail.com',
            'income' => 2000,
            'parent_node' => '3',
            'left_node' => '12',
            'right_node' => '13'     
        ]);

        GoldMember::create([
            'full_name' => 'Charles Clark',
            'email' => 'test7@mail.com',
            'contact_number' => '09543127549',
            'serial_number' => 'ADMINAAA-0007',
            'referred_by' => 'test6@mail.com',
            'income' => 2000,
            'parent_node' => '3',
            'left_node' => '14',
            'right_node' => '15'     
        ]);

        GoldMember::create([
            'full_name' => 'Jane Clark',
            'email' => 'test8@mail.com',
            'contact_number' => '09270281705',
            'serial_number' => 'ADMINAAA-0008',
            'referred_by' => 'test6@mail.com',
            'income' => 2000,
            'parent_node' => '4',
            'left_node' => '16',
            'right_node' => '17'     
        ]);

        GoldMember::create([
            'full_name' => 'Roxanne Harrison',
            'email' => 'test9@mail.com',
            'contact_number' => '09966321190',
            'serial_number' => 'ADMINAAA-0009',
            'referred_by' => 'test2@mail.com',
            'income' => 2000,
            'parent_node' => '2',
            'left_node' => '18',
            'right_node' => '19'     
        ]);

        GoldMember::create([
            'full_name' => 'Lawrence Hall',
            'email' => 'test10@mail.com',
            'contact_number' => '09955104456',
            'serial_number' => 'ADMINAAA-0010',
            'referred_by' => 'test3@mail.com',
            'income' => 2000,
            'parent_node' => '5',
            'left_node' => '20',
            'right_node' => '21'     
        ]);

        GoldMember::create([
            'full_name' => 'Tanya Castillo',
            'email' => 'test11@mail.com',
            'contact_number' => '09787408712',
            'serial_number' => 'ADMINAAA-0011',
            'referred_by' => 'test3@mail.com',
            'income' => 2000,
            'parent_node' => '5',
            'left_node' => '22',
            'right_node' => '23'     
        ]);

        GoldMember::create([
            'full_name' => 'Violet Stephens',
            'email' => 'test12@mail.com',
            'contact_number' => '09969153031',
            'serial_number' => 'ADMINAAA-0012',
            'referred_by' => 'test4@mail.com',
            'income' => 1000,
            'parent_node' => '6',
            'left_node' => '24',
            'right_node' => '25'     
        ]);

        GoldMember::create([
            'full_name' => 'Herbert Williams',
            'email' => 'test13@mail.com',
            'contact_number' => '09296861765',
            'serial_number' => 'ADMINAAA-0013',
            'referred_by' => 'test11@mail.com',
            'income' => 1000,
            'parent_node' => '6',
            'left_node' => '26',
            'right_node' => '27'     
        ]);

        GoldMember::create([
            'full_name' => 'Jamie Ocampo',
            'email' => 'test14@mail.com',
            'contact_number' => '09187384704',
            'serial_number' => 'ADMINAAA-0014',
            'referred_by' => 'test11@mail.com',
            'income' => 1000,
            'parent_node' => '7',
            'left_node' => '28',
            'right_node' => '29'     
        ]);

        GoldMember::create([
            'full_name' => 'Julie Ramos',
            'email' => 'test15@mail.com',
            'contact_number' => '09739767208',
            'serial_number' => 'ADMINAAA-0015',
            'referred_by' => 'test1@mail.com',
            'income' => 1000,
            'parent_node' => '7',
            'left_node' => '30',
            'right_node' => '31'     
        ]);

        GoldMember::create([
            'full_name' => 'Sabrina Libunao',
            'email' => 'test16@mail.com',
            'contact_number' => '09881408490',
            'serial_number' => 'ADMINAAA-0016',
            'referred_by' => '',
            'income' => 1000,
            'parent_node' => '8',
            'left_node' => '32',
            'right_node' => '33'     
        ]);

        GoldMember::create([
            'full_name' => 'Brian Lim',
            'email' => 'test17@mail.com',
            'contact_number' => '09302985091',
            'serial_number' => 'ADMINAAA-0017',
            'referred_by' => 'test16@mail.com',
            'income' => 1000,
            'parent_node' => '8',
            'left_node' => '34',
            'right_node' => '35'     
        ]);

        GoldMember::create([
            'full_name' => 'Isko Solis',
            'email' => 'test18@mail.com',
            'contact_number' => '09887268299',
            'serial_number' => 'ADMINAAA-0018',
            'referred_by' => 'test9@mail.com',
            'income' => 1000,
            'parent_node' => '9',
            'left_node' => '36' ,
            'right_node' => '37'     
        ]);

        GoldMember::create([
            'full_name' => 'Restituto Nelson',
            'email' => 'test19@mail.com',
            'contact_number' => '09639997752',
            'serial_number' => 'ADMINAAA-0019',
            'referred_by' => 'test16@mail.com',
            'income' => 1000,
            'parent_node' => '9',
            'left_node' => '38',
            'right_node' => '39'     
        ]);

        GoldMember::create([
            'full_name' => 'Rosauro Cabrera',
            'email' => 'test20@mail.com',
            'contact_number' => '09950757774',
            'serial_number' => 'ADMINAAA-0020',
            'referred_by' => 'test19@mail.com',
            'income' => 1000,
            'parent_node' => '10',
            'left_node' => '40',
            'right_node' => '41'     
        ]);


        GoldMember::create([
            'full_name' => 'Bagwis Bautista',
            'email' => 'test21@mail.com',
            'contact_number' => '09636618035',
            'serial_number' => 'ADMINAAA-0021',
            'referred_by' => 'test20@mail.com',
            'income' => 1000,
            'parent_node' => '10',
            'left_node' => '42',
            'right_node' => '43'     
        ]);

        GoldMember::create([
            'full_name' => 'Riza Francisco',
            'email' => 'test22@mail.com',
            'contact_number' => '09261332084',
            'serial_number' => 'ADMINAAA-0022',
            'referred_by' => '',
            'income' => 1000,
            'parent_node' => '11',
            'left_node' => '44',
            'right_node' => '45'     
        ]);

        GoldMember::create([
            'full_name' => 'Imelda Canlas',
            'email' => 'test23@mail.com',
            'contact_number' => '09519366533',
            'serial_number' => 'ADMINAAA-0023',
            'referred_by' => 'test22@mail.com',
            'income' => 1000,
            'parent_node' => '11',
            'left_node' => '46',
            'right_node' => '47'     
        ]);

        GoldMember::create([
            'full_name' => 'Nenita Villanueva',
            'email' => 'test24@mail.com',
            'contact_number' => '09138550764',
            'serial_number' => 'ADMINAAA-0024',
            'referred_by' => 'test22@mail.com',
            'income' => 1000,
            'parent_node' => '12',
            'left_node' => '48',
            'right_node' => '49'     
        ]);

        GoldMember::create([
            'full_name' => 'Marikit Ross',
            'email' => 'test25@mail.com',
            'contact_number' => '09644166958',
            'serial_number' => 'ADMINAAA-0025',
            'referred_by' => 'test22@mail.com',
            'income' => 0,
            'parent_node' => '12',
            'left_node' => '50',
            'right_node' => '51'     
        ]);

        GoldMember::create([
            'full_name' => 'Sinagtala Perry',
            'email' => 'test26@mail.com',
            'contact_number' => '09586467176',
            'serial_number' => 'ADMINAAA-0026',
            'referred_by' => 'test24@mail.com',
            'income' => 0,
            'parent_node' => '13',
            'left_node' => '52',
            'right_node' => '53'     
        ]);

        GoldMember::create([
            'full_name' => 'Rubilyn Bennett',
            'email' => 'test27@mail.com',
            'contact_number' => '09220047993',
            'serial_number' => 'ADMINAAA-0027',
            'referred_by' => '',
            'income' => 5000,
            'parent_node' => '13',
            'left_node' => '54',
            'right_node' => '55'     
        ]);

        GoldMember::create([
            'full_name' => 'Romel Roxas',
            'email' => 'test28@mail.com',
            'contact_number' => '09441671835',
            'serial_number' => 'ADMINAAA-0028',
            'referred_by' => '',
            'income' => 0,
            'parent_node' => '14',
            'left_node' => '56',
            'right_node' => '57'     
        ]);

        GoldMember::create([
            'full_name' => 'Arvin Evans',
            'email' => 'test29@mail.com',
            'contact_number' => '09092479329',
            'serial_number' => 'ADMINAAA-0029',
            'referred_by' => 'test27@mail.com',
            'income' => 0,
            'parent_node' => '14',
            'left_node' => '58',
            'right_node' => '59'     
        ]);

        GoldMember::create([
            'full_name' => 'Efren Cortez',
            'email' => 'test30@mail.com',
            'contact_number' => '09493856582',
            'serial_number' => 'ADMINAAA-0030',
            'referred_by' => 'test27@mail.com',
            'income' => 5000,
            'parent_node' => '15',
            'left_node' => '60',
            'right_node' => '61'     
        ]);

        GoldMember::create([
            'full_name' => 'Rodel San',
            'email' => 'test31@mail.com',
            'contact_number' => '09107553330',
            'serial_number' => 'ADMINAAA-0031',
            'referred_by' => 'test30@mail.com',
            'income' => 0,
            'parent_node' => '15',
            'left_node' => '62',
            'right_node' => '63'     
        ]);

        GoldMember::create([
            'full_name' => 'Nenita Concepcion',
            'email' => 'test32@mail.com',
            'contact_number' => '09107553330',
            'serial_number' => 'ADMINAAA-0032',
            'referred_by' => 'test30@mail.com',
            'income' => 0,
            'parent_node' => '16',
            'left_node' => '64',
            'right_node' => '65'     
        ]);

        GoldMember::create([
            'full_name' => 'Marife Bennett',
            'email' => 'test33@mail.com',
            'contact_number' => '09146996076',
            'serial_number' => 'ADMINAAA-0033',
            'referred_by' => 'test28@mail.com',
            'income' => 15000,
            'parent_node' => '16',
            'left_node' => '66',
            'right_node' => '67'     
        ]);

        GoldMember::create([
            'full_name' => 'Luntian Baker',
            'email' => 'test34@mail.com',
            'contact_number' => '09205253860',
            'serial_number' => 'ADMINAAA-0034',
            'referred_by' => 'test33@mail.com',
            'income' => 5000,
            'parent_node' => '17',
            'left_node' => '68',
            'right_node' => '69'     
        ]);

        GoldMember::create([
            'full_name' => 'Rizalyn Alexander',
            'email' => 'test35@mail.com',
            'contact_number' => '09988619377',
            'serial_number' => 'ADMINAAA-0035',
            'referred_by' => 'test33@mail.com',
            'income' => 5000,
            'parent_node' => '17',
            'left_node' => '70',
            'right_node' => '71'     
        ]);

        GoldMember::create([
            'full_name' => 'Eric Barerra',
            'email' => 'test36@mail.com',
            'contact_number' => '09607537245',
            'serial_number' => 'ADMINAAA-0036',
            'referred_by' => 'test33@mail.com',
            'income' => 0,
            'parent_node' => '18',
            'left_node' => '72',
            'right_node' => '73'     
        ]);

        GoldMember::create([
            'full_name' => 'Ezra Azarcon',
            'email' => 'test37@mail.com',
            'contact_number' => '09607537245',
            'serial_number' => 'ADMINAAA-0037',
            'referred_by' => 'test35@mail.com',
            'income' => 0,
            'parent_node' => '18',
            'left_node' => '74',
            'right_node' => '75'     
        ]);

        GoldMember::create([
            'full_name' => 'Ayana Javier',
            'email' => 'test38@mail.com',
            'contact_number' => '09905672057',
            'serial_number' => 'ADMINAAA-0038',
            'referred_by' => 'test33@mail.com',
            'income' => 0,
            'parent_node' => '19',
            'left_node' => '76',
            'right_node' => '77'     
        ]);

        GoldMember::create([
            'full_name' => 'Lilian Lavares',
            'email' => 'test39@mail.com',
            'contact_number' => '09559969648',
            'serial_number' => 'ADMINAAA-0039',
            'referred_by' => 'test33@mail.com',
            'income' => 0,
            'parent_node' => '19',
            'left_node' => '78',
            'right_node' => '79'     
        ]);

        GoldMember::create([
            'full_name' => 'Joson Infanta',
            'email' => 'test40@mail.com',
            'contact_number' => '09817140251',
            'serial_number' => 'ADMINAAA-0040',
            'referred_by' => 'test5@mail.com',
            'income' => 0,
            'parent_node' => '20',
            'left_node' => '80',
            'right_node' => '81'     
        ]);

        GoldMember::create([
            'full_name' => 'Travis Fajardo',
            'email' => 'test41@mail.com',
            'contact_number' => '09262011143',
            'serial_number' => 'ADMINAAA-0041',
            'referred_by' => 'test1@mail.com',
            'income' => 0,
            'parent_node' => '20',
            'left_node' => '82',
            'right_node' => '83'     
        ]);

        GoldMember::create([
            'full_name' => 'Christopher Soler',
            'email' => 'test42@mail.com',
            'contact_number' => '09864704366',
            'serial_number' => 'ADMINAAA-0042',
            'referred_by' => 'test1@mail.com',
            'income' => 5000,
            'parent_node' => '21',
            'left_node' => '84',
            'right_node' => '85'     
        ]);

        GoldMember::create([
            'full_name' => 'Omar Mendez',
            'email' => 'test43@mail.com',
            'contact_number' => '09573449482',
            'serial_number' => 'ADMINAAA-0043',
            'referred_by' => 'test12@mail.com',
            'income' => 5000,
            'parent_node' => '21',
            'left_node' => '86',
            'right_node' => '87'     
        ]);

        GoldMember::create([
            'full_name' => 'Josefina Andrada',
            'email' => 'test44@mail.com',
            'contact_number' => '09273842578',
            'serial_number' => 'ADMINAAA-0044',
            'referred_by' => 'test42@mail.com',
            'income' => 0,
            'parent_node' => '22',
            'left_node' => '88',
            'right_node' => '89'     
        ]);

        GoldMember::create([
            'full_name' => 'Kailey Pandapatan',
            'email' => 'test45@mail.com',
            'contact_number' => '09876560302',
            'serial_number' => 'ADMINAAA-0045',
            'referred_by' => 'test42@mail.com',
            'income' => 0,
            'parent_node' => '22',
            'left_node' => '90',
            'right_node' => '91'     
        ]);

        GoldMember::create([
            'full_name' => 'Yuricema Salvadora',
            'email' => 'test46@mail.com',
            'contact_number' => '09213307615',
            'serial_number' => 'ADMINAAA-0046',
            'referred_by' => 'test43@mail.com',
            'income' => 0,
            'parent_node' => '23',
            'left_node' => '92',
            'right_node' => '93'     
        ]);

        GoldMember::create([
            'full_name' => 'Kaneko Guadarrama',
            'email' => 'test47@mail.com',
            'contact_number' => '09346104538',
            'serial_number' => 'ADMINAAA-0047',
            'referred_by' => 'test12@mail.com',
            'income' => 0,
            'parent_node' => '23',
            'left_node' => '94',
            'right_node' => '95'     
        ]);

        GoldMember::create([
            'full_name' => 'Davin Estrada',
            'email' => 'test48@mail.com',
            'contact_number' => '09693488353',
            'serial_number' => 'ADMINAAA-0048',
            'referred_by' => 'test47@mail.com',
            'income' => 0,
            'parent_node' => '24',
            'left_node' => '96',
            'right_node' => '97'     
        ]);

        GoldMember::create([
            'full_name' => 'Tiara Perez',
            'email' => 'test49@mail.com',
            'contact_number' => '09975601348',
            'serial_number' => 'ADMINAAA-0049',
            'referred_by' => 'test43@mail.com',
            'income' => 0,
            'parent_node' => '24',
            'left_node' => '98',
            'right_node' => '99'     
        ]);

        GoldMember::create([
            'full_name' => 'Garbine Pagsisihan',
            'email' => 'test50@mail.com',
            'contact_number' => '09254502855',
            'serial_number' => 'ADMINAAA-0050',
            'referred_by' => 'test13@mail.com',
            'income' => 5000,
            'parent_node' => '25',
            'left_node' => '100',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Victor Arturo Busran Elorza',
            'email' => 'test51@mail.com',
            'contact_number' => '09833641929',
            'serial_number' => 'ADMINAAA-0051',
            'referred_by' => 'test13@mail.com',
            'income' => 0,
            'parent_node' => '25',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Kaelyn Yulo',
            'email' => 'test52@mail.com',
            'contact_number' => '09673862783',
            'serial_number' => 'ADMINAAA-0052',
            'referred_by' => 'test14@mail.com',
            'income' => 0,
            'parent_node' => '26',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Ireland Cordoba',
            'email' => 'test53@mail.com',
            'contact_number' => '09187605518',
            'serial_number' => 'ADMINAAA-0053',
            'referred_by' => 'test9@mail.com',
            'income' => 0,
            'parent_node' => '26',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Wilson Quindipan',
            'email' => 'test54@mail.com',
            'contact_number' => '09054486640',
            'serial_number' => 'ADMINAAA-0054',
            'referred_by' => '',
            'income' => 15000,
            'parent_node' => '27',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Avery Subejano',
            'email' => 'test55@mail.com',
            'contact_number' => '09130024925',
            'serial_number' => 'ADMINAAA-0055',
            'referred_by' => 'test54@mail.com',
            'income' => 5000,
            'parent_node' => '27',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Nash Elefante',
            'email' => 'test56@mail.com',
            'contact_number' => '09554692099',
            'serial_number' => 'ADMINAAA-0056',
            'referred_by' => 'test54@mail.com',
            'income' => 5000,
            'parent_node' => '28',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Kasey Tecson',
            'email' => 'test57@mail.com',
            'contact_number' => '09802195069',
            'serial_number' => 'ADMINAAA-0057',
            'referred_by' => 'test56@mail.com',
            'income' => 0,
            'parent_node' => '28',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Magsino Garcia',
            'email' => 'test58@mail.com',
            'contact_number' => '09416814311',
            'serial_number' => 'ADMINAAA-0058',
            'referred_by' => 'test56@mail.com',
            'income' => 0,
            'parent_node' => '29',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Macario Zechariah',
            'email' => 'test59@mail.com',
            'contact_number' => '09969734293',
            'serial_number' => 'ADMINAAA-0059',
            'referred_by' => 'test55@mail.com',
            'income' => 0,
            'parent_node' => '29',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Henry Chaim',
            'email' => 'test60@mail.com',
            'contact_number' => '09850788700',
            'serial_number' => 'ADMINAAA-0060',
            'referred_by' => 'test55@mail.com',
            'income' => 0,
            'parent_node' => '30',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Logan Rana',
            'email' => 'test61@mail.com',
            'contact_number' => '09944968298',
            'serial_number' => 'ADMINAAA-0061',
            'referred_by' => '',
            'income' => 10000,
            'parent_node' => '30',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Cesara Mangurun Evangelista',
            'email' => 'test62@mail.com',
            'contact_number' => '09107381272',
            'serial_number' => 'ADMINAAA-0062',
            'referred_by' => 'test61@mail.com',
            'income' => 5000,
            'parent_node' => '31',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Maitim Santillan',
            'email' => 'test63@mail.com',
            'contact_number' => '09710891524',
            'serial_number' => 'ADMINAAA-0063',
            'referred_by' => 'test61@mail.com',
            'income' => 0,
            'parent_node' => '31',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Kiana Jayde',
            'email' => 'test64@mail.com',
            'contact_number' => '09259442775',
            'serial_number' => 'ADMINAAA-0064',
            'referred_by' => 'test61@mail.com',
            'income' => 0,
            'parent_node' => '32',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Frances Cabrera',
            'email' => 'test65@mail.com',
            'contact_number' => '09806286101',
            'serial_number' => 'ADMINAAA-0065',
            'referred_by' => 'test61@mail.com',
            'income' => 0,
            'parent_node' => '32',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Neva Quindipan',
            'email' => 'test66@mail.com',
            'contact_number' => '09317747938',
            'serial_number' => 'ADMINAAA-0066',
            'referred_by' => 'test61@mail.com',
            'income' => 0,
            'parent_node' => '33',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Andres Agustin',
            'email' => 'test67@mail.com',
            'contact_number' => '09911625307',
            'serial_number' => 'ADMINAAA-0067',
            'referred_by' => 'test63@mail.com',
            'income' => 0,
            'parent_node' => '33',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Arai Dimaunahan',
            'email' => 'test68@mail.com',
            'contact_number' => '09433451436',
            'serial_number' => 'ADMINAAA-0068',
            'referred_by' => '',
            'income' => 15000,
            'parent_node' => '34',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Freddie Dimaunahan',
            'email' => 'test69@mail.com',
            'contact_number' => '09803447860',
            'serial_number' => 'ADMINAAA-0069',
            'referred_by' => 'test68@mail.com',
            'income' => 5000,
            'parent_node' => '34',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Serafin Subejano',
            'email' => 'test70@mail.com',
            'contact_number' => '09549487585',
            'serial_number' => 'ADMINAAA-0070',
            'referred_by' => 'test68@mail.com',
            'income' => 5000,
            'parent_node' => '35',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Limjap Mercadejas',
            'email' => 'test71@mail.com',
            'contact_number' => '09809925720',
            'serial_number' => 'ADMINAAA-0071',
            'referred_by' => 'test68@mail.com',
            'income' => 0,
            'parent_node' => '35',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Hidalgo Avery',
            'email' => 'test72@mail.com',
            'contact_number' => '09933058467',
            'serial_number' => 'ADMINAAA-0072',
            'referred_by' => 'test68@mail.com',
            'income' => 0,
            'parent_node' => '36',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Jane Aurkena',
            'email' => 'test73@mail.com',
            'contact_number' => '09822553240',
            'serial_number' => 'ADMINAAA-0073',
            'referred_by' => 'test68@mail.com',
            'income' => 0,
            'parent_node' => '36',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Deang Madrid',
            'email' => 'test74@mail.com',
            'contact_number' => '09275948733',
            'serial_number' => 'ADMINAAA-0074',
            'referred_by' => 'test68@mail.com',
            'income' => 0,
            'parent_node' => '37',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Payton Saturnin',
            'email' => 'test75@mail.com',
            'contact_number' => '09533709902',
            'serial_number' => 'ADMINAAA-0075',
            'referred_by' => '',
            'income' => 35000,
            'parent_node' => '37',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Kato Vilela',
            'email' => 'test76@mail.com',
            'contact_number' => '09111283206',
            'serial_number' => 'ADMINAAA-0076',
            'referred_by' => 'test75@mail.com',
            'income' => 15000,
            'parent_node' => '38',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Camren Kurtis',
            'email' => 'test77@mail.com',
            'contact_number' => '09147658372',
            'serial_number' => 'ADMINAAA-0077',
            'referred_by' => 'test75@mail.com',
            'income' => 5000,
            'parent_node' => '38',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Talaugon Leano',
            'email' => 'test78@mail.com',
            'contact_number' => '09535727215',
            'serial_number' => 'ADMINAAA-0078',
            'referred_by' => 'test75@mail.com',
            'income' => 5000,
            'parent_node' => '39',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Marta Unique',
            'email' => 'test79@mail.com',
            'contact_number' => '09416900483',
            'serial_number' => 'ADMINAAA-0079',
            'referred_by' => 'test75@mail.com',
            'income' => 0,
            'parent_node' => '39',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Logan Dulce',
            'email' => 'test80@mail.com',
            'contact_number' => '09985423529',
            'serial_number' => 'ADMINAAA-0080',
            'referred_by' => 'test75@mail.com',
            'income' => 0,
            'parent_node' => '40',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Hana Penelope',
            'email' => 'test81@mail.com',
            'contact_number' => '09780190185',
            'serial_number' => 'ADMINAAA-0081',
            'referred_by' => 'test78@mail.com',
            'income' => 0,
            'parent_node' => '40',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Griffin Agustín',
            'email' => 'test82@mail.com',
            'contact_number' => '09205415900',
            'serial_number' => 'ADMINAAA-0082',
            'referred_by' => 'test78@mail.com',
            'income' => 0,
            'parent_node' => '41',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Emilie Wood',
            'email' => 'test83@mail.com',
            'contact_number' => '09845788534',
            'serial_number' => 'ADMINAAA-0083',
            'referred_by' => 'test75@mail.com',
            'income' => 15000,
            'parent_node' => '41',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Alana Escano',
            'email' => 'test84@mail.com',
            'contact_number' => '09682820995',
            'serial_number' => 'ADMINAAA-0084',
            'referred_by' => 'test83@mail.com',
            'income' => 5000,
            'parent_node' => '42',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Dakota Simsuangco',
            'email' => 'test85@mail.com',
            'contact_number' => '09071208161',
            'serial_number' => 'ADMINAAA-0085',
            'referred_by' => 'test83@mail.com',
            'income' => 5000,
            'parent_node' => '42',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Kurt Acevedo',
            'email' => 'test86@mail.com',
            'contact_number' => '09072747460',
            'serial_number' => 'ADMINAAA-0086',
            'referred_by' => 'test83@mail.com',
            'income' => 0,
            'parent_node' => '43',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Malaya Caldero',
            'email' => 'test87@mail.com',
            'contact_number' => '09835040381',
            'serial_number' => 'ADMINAAA-0087',
            'referred_by' => 'test83@mail.com',
            'income' => 0,
            'parent_node' => '43',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Vina Alonzo',
            'email' => 'test88@mail.com',
            'contact_number' => '09894042672',
            'serial_number' => 'ADMINAAA-0088',
            'referred_by' => 'test83@mail.com',
            'income' => 0,
            'parent_node' => '44',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Fred Ciocon',
            'email' => 'test89@mail.com',
            'contact_number' => '09404435641',
            'serial_number' => 'ADMINAAA-0089',
            'referred_by' => 'test83@mail.com',
            'income' => 0,
            'parent_node' => '44',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Leopoldo Jugueta',
            'email' => 'test90@mail.com',
            'contact_number' => '09811335661',
            'serial_number' => 'ADMINAAA-0090',
            'referred_by' => 'test50@mail.com',
            'income' => 5000,
            'parent_node' => '45',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Ismael Landon',
            'email' => 'test91@mail.com',
            'contact_number' => '09494561195',
            'serial_number' => 'ADMINAAA-0091',
            'referred_by' => 'test50@mail.com',
            'income' => 0,
            'parent_node' => '45',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Jubail Atayde',
            'email' => 'test92@mail.com',
            'contact_number' => '09395583761',
            'serial_number' => 'ADMINAAA-0092',
            'referred_by' => 'test46@mail.com',
            'income' => 0,
            'parent_node' => '46',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Gian Trevion',
            'email' => 'test93@mail.com',
            'contact_number' => '09074394722',
            'serial_number' => 'ADMINAAA-0093',
            'referred_by' => 'test90@mail.com',
            'income' => 5000,
            'parent_node' => '46',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Carim Europa',
            'email' => 'test94@mail.com',
            'contact_number' => '09848173477',
            'serial_number' => 'ADMINAAA-0094',
            'referred_by' => 'test90@mail.com',
            'income' => 0,
            'parent_node' => '47',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'West Osorio',
            'email' => 'test95@mail.com',
            'contact_number' => '09688004977',
            'serial_number' => 'ADMINAAA-0095',
            'referred_by' => 'test93@mail.com',
            'income' => 0,
            'parent_node' => '47',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Marcos Siso',
            'email' => 'test96@mail.com',
            'contact_number' => '09908285734',
            'serial_number' => 'ADMINAAA-0096',
            'referred_by' => 'test93@mail.com',
            'income' => 5000,
            'parent_node' => '48',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Santino Cruzada',
            'email' => 'test97@mail.com',
            'contact_number' => '09512140843',
            'serial_number' => 'ADMINAAA-0097',
            'referred_by' => 'test96@mail.com',
            'income' => 0,
            'parent_node' => '48',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Dee Diwata',
            'email' => 'test98@mail.com',
            'contact_number' => '09954657368',
            'serial_number' => 'ADMINAAA-0098',
            'referred_by' => 'test97@mail.com',
            'income' => 0,
            'parent_node' => '49',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Fausto Dayton',
            'email' => 'test99@mail.com',
            'contact_number' => '09725637672',
            'serial_number' => 'ADMINAAA-0099',
            'referred_by' => 'test98@mail.com',
            'income' => 0,
            'parent_node' => '49',
            'left_node' => '',
            'right_node' => ''     
        ]);

        GoldMember::create([
            'full_name' => 'Marquis Dumalahay',
            'email' => 'test100@mail.com',
            'contact_number' => '09415545904',
            'serial_number' => 'ADMINAAA-0100',
            'referred_by' => 'test96@mail.com',
            'income' => 0,
            'parent_node' => '50',
            'left_node' => '',
            'right_node' => ''     
        ]);
    }
}
