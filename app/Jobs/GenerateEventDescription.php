<?php

namespace App\Jobs;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\Http; // Gerçek API için eklenebilir

class GenerateEventDescription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Event $event)
    {
        // Job çalıştığında hangi Event üzerinde çalışacağını biliyor olacak
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // 1. AI için Prompt (Komut) Hazırlıyoruz
        $prompt = "Write a creative, SEO-friendly 2-sentence marketing description for an event titled '{$this->event->title}' taking place at '{$this->event->location}'.";

        // 2. GERÇEK DÜNYA SENARYOSU (Eğer API key'in olsaydı kodu böyle yazardık):
        /*
        $response = Http::withToken(env('AI_API_KEY'))->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [['role' => 'user', 'content' => $prompt]]
        ]);
        $aiText = $response->json('choices.0.message.content');
        */

        // 3. EĞİTİM / TEST SENARYOSU:
        // Gerçek API maliyeti yaratmamak için AI'ın düşünme süresini simüle ediyoruz (3 saniye bekletiyoruz)
        sleep(3); 
        
        // Sahte AI cevabı oluşturuyoruz
        $aiText = "Don't miss out on '{$this->event->title}' at the spectacular {$this->event->location}! Get your tickets now for an unforgettable experience filled with excitement.";

        // 4. Veritabanını Güncelliyoruz
        $this->event->update([
            'description' => $aiText
        ]);

        // Terminalden işin bittiğini görebilmek için log atıyoruz
        Log::info("AI description generated for Event ID: {$this->event->id}");
    }
}