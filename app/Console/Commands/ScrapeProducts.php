<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Product;

class ScrapeProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:scrape-products';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    protected $signature = 'scrape:products';
    protected $description = 'Scrape and save products to DB';

    public function handle()
    {
        $client = new Client();
        $response = $client->get('https://laptop.themedemo.site/san-pham.html');
        $html = $response->getBody()->getContents();
        $crawler = new Crawler($html);

        $crawler->filter('.product-block')->each(function ($node) {
            $name = $node->filter('.product-name')->text() ?? null;
            $price_sale = $node->filter('.price')->text() ?? null;
            $image = $node->filter('img')->attr('src') ?? null;

            Product::create([
                'name' => $name,
                'price_sale' => $price_sale,
                'images' => [$image], // lưu mảng
                // Các field còn lại bạn có thể xử lý thêm tại đây nếu website có
            ]);
        });

        $this->info('✔️ Dữ liệu sản phẩm đã được lưu vào DB.');
    }
}
