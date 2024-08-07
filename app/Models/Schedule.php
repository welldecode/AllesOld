<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\MassPrunable;

class Schedule extends Model
{
    use HasApiTokens, HasFactory, Notifiable, MassPrunable;

    protected $fillable = ['values', 'id_collaborators'];
    protected $casts = [
        'values' => 'array', // Cast JSON column to array
    ];
    protected $guarded = [];

 
    public static function isDateInCycle($dataSelecionada, $dataInicio, $dataFim)
    {
        // Converte as datas para objetos DateTime
        $dataSelecionada = new DateTime($dataSelecionada);
        $dataInicio = new DateTime($dataInicio);
        $dataFim = new DateTime($dataFim);
    
      // Verificar se a data selecionada está entre a data de início e a data de fim (inclusive)
      if ($dataSelecionada >= $dataInicio && $dataSelecionada <= $dataFim) {
        return true;
    } else {
        return false;
    }
    }

    public function verificarValorNoArray($array)
    {
        // Conta a ocorrência de cada valor no array
        $contagem = array_count_values($array);

        // Verifica se há valores com contagem maior que 1 (duplicatas)
        foreach ($contagem as $valor => $ocorrencias) {
            if ($ocorrencias > 1) {
                return true; // Retorna verdadeiro se encontrar uma duplicata
            }
        }

        return false; // Retorna falso se não encontrar duplicatas
    }

    function schedule_de(...$listas)
    {
        // Inicializa um array para armazenar os valores duplicados
        $duplicados = array();

        // Itera sobre cada lista
        foreach ($listas as $nomeLista => $lista) {
            // Conta a ocorrência de cada valor na lista
            $contagem = array_count_values($lista);

            // Verifica se algum valor tem uma contagem maior que 1
            foreach ($contagem as $valor => $ocorrencia) {
                if ($ocorrencia > 1) {
                    // Adiciona o valor duplicado à lista de duplicados junto com o nome da lista
                    $duplicados[$valor][] = $nomeLista;
                }
            }
        }

        // Retorna a lista de valores duplicados
        return $duplicados;
    }
    public static function listDaysSchedule($dataInicio, $dataFim)
    {
        // Converte as datas de string para objetos DateTime
        $inicio = new DateTime($dataInicio);
        $fim = new DateTime($dataFim);

        // Calcula o número de dias restantes
        $diasRestantes = [];
        while ($inicio <= $fim) {
            $diasRestantes[] = $inicio->format('Y-m-d H:i');
            $inicio->modify('+1 day');
        }

        return $diasRestantes;
    }

    // Função para verificar se a data de início já passou da data final e da data atual
    public static function hasStartDatePassedEndDate($startDate, $endDate)
    {
        // Obter a data atual no formato 'Y-m-d'
        $currentDate = date('Y-m-d H:i');

        // Convertendo as datas para timestamps para comparação
        $startDateTimestamp = strtotime($startDate);
        $endDateTimestamp = strtotime($endDate);
        $currentDateTimestamp = strtotime($currentDate);

        // Verifica se a data de início já passou da data final e da data atual
        return ($startDateTimestamp < $currentDateTimestamp && $startDateTimestamp > $endDateTimestamp);
    }

}
