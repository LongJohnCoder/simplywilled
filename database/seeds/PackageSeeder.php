<?php

use Illuminate\Database\Seeder;
use App\Models\Packages;
use App\Models\Coupon;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Packages::updateOrCreate(
          ['id'=> 1],
          [
            'name'=> 'Single Will',
            'amount'=> 199.00,
            'description'=> 'Single will package',
            'status'=> '1',
            'valid_till'=> date('Y-m-d H:i:s'),
            'key_benefits'=> json_encode([
                'Faster and easier than hiring a lawyer*',
                'Make a Simple Will & Supporting Documents for you',
                'Leave property to those you love',
                'Provide for your children & your estate',
                'Appoint a guardian for minor children',
                'Plan for a medical emergency',
                'Appoint a financial power of attorney',
                'Make your final wishes known',
                'Update your plan as often as you wish'
            ]),
            'included'=> json_encode([
              'Includes a Complete Set of Documents For 1 Person',
              'A Last Will & Testament',
              'Healthcare Power of Attorney',
              'Durable General Power of Attorney',
              'Living Will',
              'HIPAA Wavier',
              'Burial Instructions'
            ])
          ]
      );
      Coupon::updateOrCreate(
        ['id'=> 1],
        [
          'description'=> 'Default Coupon',
          'token'=> '123456',
          'percentage'=>0,
          'max_user'=>0,
          'status'=>1,
          'expired_on'=>date('Y-m-d H:i:s')
        ]
      );

    }
}
