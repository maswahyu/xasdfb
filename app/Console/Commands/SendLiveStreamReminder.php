<?php

namespace App\Console\Commands;

use App\RemainderEventStream;
use App\EventStream;
use App\Mail\LiveStreamReminder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendLiveStreamReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'live-stream:send-reminder {live_stream_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send live stream reminder to subscribed live stream emails by stream id.';

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
        $streamId = $this->argument('live_stream_id');
        $stream = EventStream::find($streamId);
        $emails = $this->fetchEmails($stream);

        foreach ($emails as $data) {
            echo "> sending to " . $data->email . "\n";
            Mail::to($data->email)
                ->send(new LiveStreamReminder($stream));
        }
    }

    public function fetchEmails(EventStream $stream)
    {
        return RemainderEventStream::select('email')->where('event_stream_id', $stream->id)->distinct()->get();
    }
}
