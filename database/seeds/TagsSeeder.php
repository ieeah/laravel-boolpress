<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Front end', 'Back end', 'Design', 'UX', 'Laravel'];

        foreach ($tags as $tag) {
            $new = new Tag();
            $new->name = $tag;
            $new->slug = Str::slug($tag, '-');
            $new->save();
        }
    }
}
