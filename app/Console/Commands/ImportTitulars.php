<?php

namespace App\Console\Commands;

use App\Imports\TitularsImport;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
class ImportTitulars extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importacion de titulares de educacion basica';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
        $this->output->title('Iniciando importacion');
    }
}
