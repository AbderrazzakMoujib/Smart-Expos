<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryPhoto;

class SyncEventCategories extends Command
{
    protected $signature   = 'smart:sync-categories';
    protected $description = 'Sync event photos/videos into auto-categories (one per event)';

    public function handle(): int
    {
        $posts = Post::where(function ($q) {
            $q->whereNotNull('img1')
              ->orWhereNotNull('img2')
              ->orWhereNotNull('img3')
              ->orWhereNotNull('recap_video');
        })->get(['id','title','slug','logo','image','img1','img2','img3','recap_video']);

        $this->info("Found {$posts->count()} events with photos or videos.");
        $created = 0;
        $updated = 0;

        foreach ($posts as $post) {
            // ── Photo category ──
            $paths = array_filter([$post->img1, $post->img2, $post->img3]);

            if (!empty($paths)) {
                $isNew = !Category::where('post_id', $post->id)->where('type', 'photos')->exists();

                $cat = Category::firstOrCreate(
                    ['post_id' => $post->id, 'type' => 'photos'],
                    [
                        'name'  => $post->title,
                        'slug'  => 'event-photos-' . $post->slug,
                        'order' => Category::max('order') + 1,
                        'cover' => $post->logo ?: $post->image,
                    ]
                );

                $cat->update([
                    'name'  => $post->title,
                    'slug'  => 'event-photos-' . $post->slug,
                    'cover' => $post->logo ?: $post->image,
                ]);

                $cat->photos()->delete();
                foreach ($paths as $path) {
                    CategoryPhoto::create(['category_id' => $cat->id, 'path' => $path]);
                }

                $isNew ? $created++ : $updated++;
                $this->line('  ' . ($isNew ? 'CREATED' : 'UPDATED') . ' [photos] — ' . $post->title);
            }

        }

        $this->newLine();
        $this->info("Done. Created: {$created} | Updated: {$updated}");

        return self::SUCCESS;
    }
}
