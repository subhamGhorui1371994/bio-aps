<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: peachpuff;">


    <div>
        <ul>
            <li>{!! html_entity_decode($bankDtlData->BANK_CODE) !!}</li>
            <li>{!! html_entity_decode($bankDtlData->BANK_NAME) !!}</li>
            <li>{{$bankDtlData['A/C_HOLDER']}}</li>
            <li>{{$bankDtlData['A/C_NUMBER']}}</li>
            {{-- <li>{!! html_entity_decode($bankDtlData->A/C_HOLDER) !!}</li> --}}
            {{-- <li>{!! html_entity_decode($bankDtlData->A/C_NUMBER) !!}</li> --}}
            <li>{!! html_entity_decode($bankDtlData->BRANCH_NAME) !!}</li>
            <li>{!! html_entity_decode($bankDtlData->BRANCH_CODE) !!}</li>
            <li>{!! html_entity_decode($bankDtlData->ADDRESS) !!}</li>
            <li>{!! html_entity_decode($bankDtlData->IFSC_CODE) !!}</li>
        </ul>
    </div>
</body>
</html>
