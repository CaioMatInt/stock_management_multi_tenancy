<?php

namespace Tests\Functions;

use Illuminate\Support\Facades\DB;

class DatabaseTestingFunctions
{

    public function compareArrayOfTablePropertiesToTablePropertiesOfCreatedTableInDatabase(string $tableName, array $columnsCorrectProperties)
    {

        $createdColumnsProperties = collect(DB::select("SELECT column_name, data_type, character_maximum_length, is_nullable 
    FROM information_schema.columns WHERE table_name = '" . $tableName . "'"));

        if($tableName == 'products'){
           /* dd($createdColumnsProperties, $tableName);*/
        }

        $columnsWithUnexpectedProperties = [];
        $columnsThatDoesntExistInCurrentCreatedTable = [];

        foreach ($columnsCorrectProperties as $columnCorrectProperties) {
            $currentCreatedColumnProperties = $createdColumnsProperties->where('column_name', $columnCorrectProperties['column_name'])->first();

            if (!is_null($currentCreatedColumnProperties)) {
                $currentCreatedColumnProperties = collect($currentCreatedColumnProperties);
                $columnCorrectProperties = collect($columnCorrectProperties);

                $diffBetweenExpectedColumnPropetiesndCurrentColumnPropeties = $currentCreatedColumnProperties->diffAssoc($columnCorrectProperties);
                if (!$diffBetweenExpectedColumnPropetiesndCurrentColumnPropeties->isEmpty()) {
                    $columnsWithUnexpectedProperties[] = $columnCorrectProperties['column_name'];
                }
            } else {
                $columnsThatDoesntExistInCurrentCreatedTable[] = $columnCorrectProperties['column_name'];
            }
        }

        $errorMessage = null;

        if (!empty($columnsWithUnexpectedProperties)) {
            $errorMessage .= ' > The following column(s) have wrong properties: ' . json_encode($columnsWithUnexpectedProperties);
        }

        if (!empty($columnsThatDoesntExistInCurrentCreatedTable)) {
            $errorMessage .= ' > The following column(s) do not exist in the currently created table: ' . json_encode($columnsThatDoesntExistInCurrentCreatedTable);
        }

        return $errorMessage;

    }


}
