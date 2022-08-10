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
            <li>{!! html_entity_decode($employeeDtlData->BRANCH_NAME) !!}</li>
            <li>{!! html_entity_decode($employeeDtlData->BRANCH_CODE) !!}</li>
            <li>{!! html_entity_decode($employeeDtlData->EMPLOYEE_NAME) !!}</li>
            <li>{!! html_entity_decode($employeeDtlData->EMPLOYEE_CODE) !!}</li>
            <li>{!! html_entity_decode($employeeDtlData->ADDRESS) !!}</li>
            <li>{!! html_entity_decode($employeeDtlData->CITY) !!}</li>
            <li>{!! html_entity_decode($employeeDtlData->PIN) !!}</li>
            <li>{!! html_entity_decode($employeeDtlData->STATE) !!}</li>
            <li>{!! html_entity_decode($employeeDtlData->STATE_NAME) !!}</li>
            <li>{!! html_entity_decode($employeeDtlData->COUNTRY) !!}</li>
            <li>{!! html_entity_decode($employeeDtlData->PAN) !!}</li>
            <li>{!! html_entity_decode($employeeDtlData->EMAIL) !!}</li>
            <li>{!! html_entity_decode($employeeDtlData->CONTACT_NO) !!}</li>
        </ul>
    </div>
</body>
</html>
