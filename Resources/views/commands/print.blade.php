<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .mb-30 {
            margin-bottom: 30px;
        }

        .mb-25 {
            margin-bottom: 25px;
        }

        .mb-20 {
            margin-bottom: 20px;
        }

        .border {
            border: 1px solid #000;
        }

        .border-left {
            border-left: 1px solid #000;
        }

        .border-right {
            border-right: 1px solid #000;
        }

        .border-top {
            border-top: 1px solid #000;
        }

        .border-bottom {
            border-bottom: 1px solid #000;
        }

        .w-100 {
            width: 100%;
        }

        .bg-red {
            background-color: #f00;
        }

        .frist-block table {
            padding: 5px;
        }

        .frist-block td {
            padding: 5px;
        }

        .second-block td {
            padding: 5px;
        }
    </style>
</head>

<body class="bg-white">
    <table class="w-100 border frist-block mb-20">
        <tr>
            <td width="40%">
                CORTADEIRA:
                <span class="border-bottom">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
            </td>
            <td width="20%">INICIO: {{ $command->created_at->format('Y/m/d') }}</td>
            <td width="20%">FIM:
                <span class="border-bottom">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
            </td>
            <td width="20%">CC/OPN: {{ $command->code }}</td>
        </tr>
        <tr>
            <td>
                LARGURA DOS ENFESTOS:
                <span class="border-bottom">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
            </td>
            <td colspan="2">COMP. DIS RISCOS:
                <span class="border-bottom">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
            </td>
            <td>PEÇAS:
                <span class="border-bottom">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
            </td>
        </tr>
        <tr>
            <td>
                APROVADO:
                <span class="border-bottom">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
            </td>
            <td colspan="2">APROVEITAMENTO:
                <span class="border-bottom">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                %
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
                PESO FOLHA:
                <span class="border-bottom">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                Kg
            </td>
            <td colspan="2">
                PRAZO DE ENTREGA:
                <span class="border-bottom">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
            </td>
        </tr>
    </table>

    <table class="w-100 second-block mb-20" cellspacing="0px" cellpadding="0px">
        <tr>
            <td class="border-left border-top border-bottom">ID</td>
            <td class="border-left border-top border-bottom">TECIDO</td>
            <td class="border-left border-top border-bottom">COR</td>
            <td class="border-left border-top border-bottom">PED.</td>
            <td class="border-left border-top border-bottom">REAL</td>
            <td class="border-left border-top border-bottom">PREVISÃO</td>
            <td class="border-left border-right border-top border-bottom">GASTO REAL</td>
        </tr>
        @foreach($command_fabrics as $index => $command_fabric)
        <tr>
            <td class="border-left border-bottom">{{ $index }}</td>
            <td class="border-left border-bottom">{{ $command_fabric->fabric->name }}</td>
            <td class="border-left border-bottom">{{ $command_fabric->color->name }}</td>
            <td class="border-left border-bottom">{{ $command_fabric->sheets }}</td>
            <td class="border-left border-bottom"></td>
            <td class="border-left border-bottom">@kilo($command_fabric->prevision)</td>
            <td class="border-left border-right border-bottom"></td>
        </tr>
        @endforeach
    </table>

    <table class="w-100 second-block mb-20" cellspacing="0px" cellpadding="0px">
        <tr>
            <td class="border-top border-bottom border-left">ID</td>
            <td class="border-top border-bottom border-left">PÇ</td>
            <td class="border-top border-bottom border-left">ANTES</td>
            <td class="border-top border-bottom border-left">DEPOIS</td>
            <td class="border-top border-bottom border-left">CAN.</td>
            <td class="border-top border-bottom border-right">GASTOS</td>
        </tr>
        <tr>
            <td class="border-bottom border-left">&nbsp;</td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-right"></td>
        </tr>
        <tr>
            <td class="border-bottom border-left">&nbsp;</td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-right"></td>
        </tr>
        <tr>
            <td class="border-bottom border-left">&nbsp;</td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-right"></td>
        </tr>
        <tr>
            <td class="border-bottom border-left">&nbsp;</td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-right"></td>
        </tr>
        <tr>
            <td class="border-bottom border-left">&nbsp;</td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-right"></td>
        </tr>
        <tr>
            <td class="border-bottom border-left">&nbsp;</td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-left"></td>
            <td class="border-bottom border-right"></td>
        </tr>
        <table>

            <table class="w-100 second-block mb-20" cellspacing="0px" cellpadding="0px">
                <tr>
                    <td class="border-top border-bottom border-left" colspan="3"></td>
                    <td class="border-top border-bottom border-left border-right" colspan="{{ $sizes->count() }}">TAMANHOS</td>
                </tr>
                <tr>
                    <td class="border-bottom border-left">REF.</td>
                    <td class="border-bottom border-left">MOLDES</td>
                    <td class="border-bottom border-left">TEC.</td>
                    @foreach($sizes as $size)
                    <td class="border-bottom border-left {{ ($loop->last)?'border-right':'' }}">{{ $size->name }}</td>
                    @endforeach
                </tr>
                @foreach($command_risks_grouped as $command_risk_grouped)
                <tr>
                    <td class="border-bottom border-left">{{ $command_risk_grouped->reference->code }}</td>
                    <td class="border-bottom border-left">{{ $command_risk_grouped->shape->name }}</td>
                    <td class="border-bottom border-left"></td>
                    @foreach($sizes as $size)
                    <td class="border-bottom border-left {{ ($loop->last)?'border-right':'' }}">
                        @php
                        $index = $command_risks->search(function ($command_risk) use($size, $command_risk_grouped) {
                            if($command_risk->shape_id == $command_risk_grouped->shape_id && $command_risk->reference_id == $command_risk_grouped->reference_id && $command_risk->size_id == $size->id){
                                return true;
                            }
                        });
                        if($index !== false){
                            echo ($command_risks->get($index))->units;
                        }
                        @endphp
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </table>





            <table class="w-100 second-block mb-20" cellspacing="0px" cellpadding="0px">
                <tr>
                    <td class="border-top border-left border-right">OBSERVAÇÃO CORTADEIRA:</td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom">&nbsp;</td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom">&nbsp;</td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom">&nbsp;</td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom">&nbsp;</td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom">&nbsp;</td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom">&nbsp;</td>
                </tr>
            </table>

            <table class="w-100 second-block mb-20" cellspacing="0px" cellpadding="0px">
                <tr>
                    <td class="border-top border-left border-right">OBSERVAÇÃO PCP:</td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom">&nbsp;</td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom">&nbsp;</td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom">&nbsp;</td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom">&nbsp;</td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom">&nbsp;</td>
                </tr>
                <tr>
                    <td class="border-left border-right border-bottom">&nbsp;</td>
                </tr>
            </table>
</body>

</html>