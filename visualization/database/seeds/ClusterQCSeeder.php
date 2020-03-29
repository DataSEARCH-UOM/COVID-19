<?php

use Illuminate\Database\Seeder;

class ClusterQCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $clusters = [
            ['id'=>1,'cluster_name'=>"katunayake",'lat'=>"7.1725000",'long'=>"79.8853000",'created_at'=>"2020-03-28 13:15:19",'updated_at'=>"2020-03-28 13:15:19"],
            ['id'=>2,'cluster_name'=>"Mattegoda",'lat'=>"6.8135000",'long'=>"79.9724000",'created_at'=>"2020-03-28 13:17:38",'updated_at'=>"2020-03-28 13:17:38"],
            ['id'=>3,'cluster_name'=>"Colombo",'lat'=>"6.9271000",'long'=>"79.8612000",'created_at'=>"2020-03-28 13:21:43",'updated_at'=>"2020-03-28 13:21:43"],
            ['id'=>4,'cluster_name'=>"Mahara",'lat'=>"6.9909000",'long'=>"79.9396000",'created_at'=>"2020-03-28 13:25:10",'updated_at'=>"2020-03-28 13:25:10"],
            ['id'=>5,'cluster_name'=>"Udubeddawa",'lat'=>"7.4853000",'long'=>"79.9675000",'created_at'=>"2020-03-28 13:25:47",'updated_at'=>"2020-03-28 13:25:47"],
            ['id'=>6,'cluster_name'=>"Dunkannawa",'lat'=>"7.4197000",'long'=>"79.9100000",'created_at'=>"2020-03-28 13:28:20",'updated_at'=>"2020-03-28 13:28:20"],
            ['id'=>7,'cluster_name'=>"Borella",'lat'=>"6.9122000",'long'=>"79.8829000",'created_at'=>"2020-03-28 13:28:40",'updated_at'=>"2020-03-28 13:28:40"],
            ['id'=>8,'cluster_name'=>"Mt_Lavinia",'lat'=>"6.8301000",'long'=>"79.8801000",'created_at'=>"2020-03-28 13:29:55",'updated_at'=>"2020-03-28 13:29:55"],
            ['id'=>9,'cluster_name'=>"Galle",'lat'=>"6.0535000",'long'=>"80.2210000",'created_at'=>"2020-03-28 13:30:33",'updated_at'=>"2020-03-28 13:30:33"],
            ['id'=>10,'cluster_name'=>"Akuregoda",'lat'=>"6.8937000",'long'=>"79.9480000",'created_at'=>"2020-03-28 13:32:16",'updated_at'=>"2020-03-28 13:32:16"],
            ['id'=>11,'cluster_name'=>"Rajagiriya",'lat'=>"6.9094000",'long'=>"79.8943000",'created_at'=>"2020-03-28 13:33:49",'updated_at'=>"2020-03-28 13:33:49"],
            ['id'=>12,'cluster_name'=>"Bauddaloka_Mawatha",'lat'=>"6.9027660",'long'=>"79.8702880",'created_at'=>"2020-03-28 13:35:03",'updated_at'=>"2020-03-28 13:35:03"],
            ['id'=>13,'cluster_name'=>"Kandakadu_QC",'lat'=>"8.0871000",'long'=>"81.1770000",'created_at'=>"2020-03-28 13:35:54",'updated_at'=>"2020-03-28 13:35:54"],
            ['id'=>14,'cluster_name'=>"Galkanda",'lat'=>"7.4114000",'long'=>"80.5681000",'created_at'=>"2020-03-28 13:36:45",'updated_at'=>"2020-03-28 13:36:45"],
            ['id'=>15,'cluster_name'=>"Marawila",'lat'=>"7.4239000",'long'=>"79.8353000",'created_at'=>"2020-03-28 13:37:22",'updated_at'=>"2020-03-28 13:37:22"],
            ['id'=>16,'cluster_name'=>"Ratnapura",'lat'=>"6.7056000",'long'=>"80.3847000",'created_at'=>"2020-03-28 13:38:03",'updated_at'=>"2020-03-28 13:38:03"],
            ['id'=>17,'cluster_name'=>"Baticloa_QC",'lat'=>"7.7310000",'long'=>"81.6747000",'created_at'=>"2020-03-28 13:40:56",'updated_at'=>"2020-03-28 13:40:56"],
            ['id'=>18,'cluster_name'=>"Vauniya_QC",'lat'=>"8.7542000",'long'=>"80.4982000",'created_at'=>"2020-03-28 13:41:58",'updated_at'=>"2020-03-28 13:41:58"],
            ['id'=>19,'cluster_name'=>"Udugampola",'lat'=>"7.1264000",'long'=>"79.9780000",'created_at'=>"2020-03-28 13:42:40",'updated_at'=>"2020-03-28 13:42:40"],
            ['id'=>20,'cluster_name'=>"Kelaniya",'lat'=>"6.9518000",'long'=>"79.9133000",'created_at'=>"2020-03-28 13:43:58",'updated_at'=>"2020-03-28 13:43:58"],
            ['id'=>21,'cluster_name'=>"Wattala",'lat'=>"6.9907000",'long'=>"79.8932000",'created_at'=>"2020-03-28 13:45:00",'updated_at'=>"2020-03-28 13:45:00"],
            ['id'=>22,'cluster_name'=>"Nelundeniya",'lat'=>"7.2308000",'long'=>"80.2600000",'created_at'=>"2020-03-28 13:46:31",'updated_at'=>"2020-03-28 13:46:31"],
            ['id'=>23,'cluster_name'=>"Kalutara_South",'lat'=>"6.5818000",'long'=>"79.9619000",'created_at'=>"2020-03-28 13:47:04",'updated_at'=>"2020-03-28 13:47:04"],
            ['id'=>24,'cluster_name'=>"Waikkala",'lat'=>"7.2838000",'long'=>"79.8578000",'created_at'=>"2020-03-28 13:48:50",'updated_at'=>"2020-03-28 13:48:50"],
            ['id'=>25,'cluster_name'=>"Morawaka",'lat'=>"6.2653000",'long'=>"80.4910000",'created_at'=>"2020-03-28 13:49:22",'updated_at'=>"2020-03-28 13:49:22"],
            ['id'=>26,'cluster_name'=>"Bandaragama",'lat'=>"6.7144000",'long'=>"79.9891000",'created_at'=>"2020-03-28 13:49:59",'updated_at'=>"2020-03-28 13:49:59"],
            ['id'=>27,'cluster_name'=>"Beruwala",'lat'=>"6.4738000",'long'=>"79.9920000",'created_at'=>"2020-03-28 13:51:17",'updated_at'=>"2020-03-28 13:51:17"],
            ['id'=>28,'cluster_name'=>"Malabe",'lat'=>"6.9061000",'long'=>"79.9696000",'created_at'=>"2020-03-28 13:51:45",'updated_at'=>"2020-03-28 13:51:45"],
            ['id'=>29,'cluster_name'=>"Rathmalana",'lat'=>"6.8195000",'long'=>"79.8801000",'created_at'=>"2020-03-28 13:53:12",'updated_at'=>"2020-03-28 13:53:12"],
            ['id'=>30,'cluster_name'=>"Wattala",'lat'=>"6.9907000",'long'=>"79.8932000",'created_at'=>"2020-03-28 13:54:06",'updated_at'=>"2020-03-28 13:54:06"],
            ['id'=>31,'cluster_name'=>"Ja_Ela",'lat'=>"7.0668000",'long'=>"79.9041000",'created_at'=>"2020-03-28 13:55:47",'updated_at'=>"2020-03-28 13:55:47"],
            ['id'=>32,'cluster_name'=>"Niwasipura",'lat'=>"7.1027000",'long'=>"79.8976000",'created_at'=>"2020-03-28 13:57:10",'updated_at'=>"2020-03-28 13:57:10"],
            ['id'=>33,'cluster_name'=>"Panadura",'lat'=>"6.7106000",'long'=>"79.9074000",'created_at'=>"2020-03-28 13:57:51",'updated_at'=>"2020-03-28 13:57:51"],
            ['id'=>34,'cluster_name'=>"Wellawaya",'lat'=>"6.7377000",'long'=>"81.1031000",'created_at'=>"2020-03-28 13:58:31",'updated_at'=>"2020-03-28 13:58:31"],
            ['id'=>35,'cluster_name'=>"Uduvil",'lat'=>"9.7341000",'long'=>"80.0106000",'created_at'=>"2020-03-28 13:59:13",'updated_at'=>"2020-03-28 13:59:13"],
            ['id'=>36,'cluster_name'=>"Sedawatta",'lat'=>"6.9539000",'long'=>"79.8836000",'created_at'=>"2020-03-28 13:59:42",'updated_at'=>"2020-03-28 13:59:42"],
            ['id'=>37,'cluster_name'=>"Nugegoda",'lat'=>"6.8649000",'long'=>"79.8997000",'created_at'=>"2020-03-28 14:00:28",'updated_at'=>"2020-03-28 14:00:28"],
            ['id'=>38,'cluster_name'=>"Maggona",'lat'=>"6.5096000",'long'=>"79.9957000",'created_at'=>"2020-03-28 14:01:15",'updated_at'=>"2020-03-28 14:01:15"],
            ['id'=>39,'cluster_name'=>"Arukgoda",'lat'=>"6.4397000",'long'=>"80.4878000",'created_at'=>"2020-03-28 14:02:22",'updated_at'=>"2020-03-28 14:02:22"],
            ['id'=>40,'cluster_name'=>"Himbutana",'lat'=>"6.9345000",'long'=>"79.9060000",'created_at'=>"2020-03-28 14:03:33",'updated_at'=>"2020-03-28 14:03:33"],
            ['id'=>41,'cluster_name'=>"Kalutara",'lat'=>"6.5854000",'long'=>"79.9607000",'created_at'=>"2020-03-28 14:04:12",'updated_at'=>"2020-03-28 14:04:12"],
            ['id'=>42,'cluster_name'=>"Boralesgamuwa",'lat'=>"6.8410000",'long'=>"79.9017000",'created_at'=>"2020-03-28 14:05:39",'updated_at'=>"2020-03-28 14:05:39"],
            ['id'=>43,'cluster_name'=>"Matara",'lat'=>"5.9549000",'long'=>"80.5550000",'created_at'=>"2020-03-28 14:14:54",'updated_at'=>"2020-03-28 14:14:54"],
            ['id'=>44,'cluster_name'=>"Dankotuwa",'lat'=>"7.2975000",'long'=>"79.8822000",'created_at'=>"2020-03-28 14:15:33",'updated_at'=>"2020-03-28 14:15:33"],
            ['id'=>45,'cluster_name'=>"Kolonnawa",'lat'=>"6.9284000",'long'=>"79.8950000",'created_at'=>"2020-03-28 14:16:06",'updated_at'=>"2020-03-28 14:16:06"],
            ['id'=>46,'cluster_name'=>"Wennappuwa",'lat'=>"7.3493000",'long'=>"79.8353000",'created_at'=>"2020-03-28 14:16:31",'updated_at'=>"2020-03-28 14:16:31"],
            ['id'=>47,'cluster_name'=>"Kalutara_North",'lat'=>"6.5977000",'long'=>"79.9544000",'created_at'=>"2020-03-28 14:17:14",'updated_at'=>"2020-03-28 14:17:14"],
            ['id'=>48,'cluster_name'=>"Gothatuwa",'lat'=>"6.9248000",'long'=>"79.9151000",'created_at'=>"2020-03-28 14:17:48",'updated_at'=>"2020-03-28 14:17:48"],
            ['id'=>49,'cluster_name'=>"Colombo_4",'lat'=>"6.8961000",'long'=>"79.8571000",'created_at'=>"2020-03-28 14:19:12",'updated_at'=>"2020-03-28 14:19:12"],

        ];

        \App\ClusterQC::insert($clusters);
    }
}
