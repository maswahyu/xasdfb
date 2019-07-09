<?php

namespace App\Jobs;

use App\News;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NewsScheduler implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $news;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->news->publish = News::STATUS_PUBLISHED;
        $this->news->save();
    }
}
