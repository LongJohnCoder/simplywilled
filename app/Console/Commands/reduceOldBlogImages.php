<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Blogs;

class reduceOldBlogImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:optimize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
          $blogs = Blogs::all();
          if(! \File::exists(public_path('/blogImageOld'))) {
            \File::makeDirectory(public_path('/blogImageOld'), 0777, true, true);
          }
            foreach ($blogs as $key => $value) {
              if (\File::exists(public_path('/blogImage/').$value->image)) {
                $old_path = public_path('/blogImage/').$value->image;
                $new_path = public_path('/blogImageOld/').$value->image;
                $move = \File::move($old_path, $new_path);

                $jpg = (string) \Image::make($new_path)
                        ->resize(900, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save($old_path, 80);
                chmod(public_path('/blogImage/').$value->image,0777);
                \Log::info('Image =>'. $value->image.' moved and reduced');
              }
            }
        } catch (\Exception $e) {
          \Log::info('Image =>'. $value->image.' not moved and reduced'.'error =>'.$e->getLine().' msg => '.$e->getMessage());
        }
    }
}
