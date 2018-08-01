<?php

namespace Modules\Admin\Model;

use Modules\Admin\Model\Modelo;



class Saclie extends modelo
{
    protected $table = 'saclie';
    protected $fillable = ["CodClie","Descrip","ID3","TipoID3","TipoID","Activo","DescOrder","Clase","Represent","Direc1","Direc2","Pais","Estado","Ciudad","Municipio","ZipCode","Telef","Movil","Email","Fax","FechaE","CodZona","CodVend","CodConv","CodAlte","TipoCli","TipoPVP","Observa","EsMoneda","EsCredito","LimiteCred","DiasCred","EsToleran","DiasTole","IntMora","Descto","Saldo","PagosA","FechaUV","MontoUV","NumeroUV","FechaUP","MontoUP","NumeroUP","MontoMax","MtoMaxCred","PromPago","RetenIVA","SaldoPtos","DescripExt","NIT","EsReten"];
    protected $campos = [
    'CodClie' => [
        'type' => 'text',
        'label' => 'Cod Clie',
        'placeholder' => 'Cod Clie del cliente'
    ],
    'Descrip' => [
        'type' => 'text',
        'label' => 'Descrip',
        'placeholder' => 'Descrip del cliente'
    ],
    'ID3' => [
        'type' => 'text',
        'label' => 'I D3',
        'placeholder' => 'ID Fiscal'
    ],
    'TipoID3' => [
        'type' => 'text',
        'label' => 'Tipo I D3',
        'placeholder' => 'Tipo I D3 del cliente'
    ],
    'TipoID' => [
        'type' => 'text',
        'label' => 'Tipo I D',
        'placeholder' => 'Tipo I D del cliente'
    ],
    'Activo' => [
        'type' => 'text',
        'label' => 'Activo',
        'placeholder' => 'Activo del cliente'
    ],
    'DescOrder' => [
        'type' => 'text',
        'label' => 'Desc Order',
        'placeholder' => 'Desc Order del cliente'
    ],
    'Clase' => [
        'type' => 'text',
        'label' => 'Clase',
        'placeholder' => 'Clase del cliente'
    ],
    'Represent' => [
        'type' => 'text',
        'label' => 'Represent',
        'placeholder' => 'Represent del cliente'
    ],
    'Direc1' => [
        'type' => 'text',
        'label' => 'Direc1',
        'placeholder' => 'Direc1 del cliente'
    ],
    'Direc2' => [
        'type' => 'text',
        'label' => 'Direc2',
        'placeholder' => 'Direc2 del cliente'
    ],
    'Pais' => [
        'type' => 'number',
        'label' => 'Pais',
        'placeholder' => 'Pais del cliente'
    ],
    'Estado' => [
        'type' => 'number',
        'label' => 'Estado',
        'placeholder' => 'Estado del cliente'
    ],
    'Ciudad' => [
        'type' => 'select',
        'label' => 'Ciudad',
        'placeholder' => 'Ciudad del Cliente'
    ],
    'Municipio' => [
        'type' => 'select',
        'label' => 'Municipio',
        'placeholder' => 'Municipio del Cliente'
    ],
    'ZipCode' => [
        'type' => 'text',
        'label' => 'Zip Code',
        'placeholder' => 'Zip Code del cliente'
    ],
    'Telef' => [
        'type' => 'text',
        'label' => 'Telef',
        'placeholder' => 'Telef del cliente'
    ],
    'Movil' => [
        'type' => 'text',
        'label' => 'Movil',
        'placeholder' => 'Movil del cliente'
    ],
    'Email' => [
        'type' => 'text',
        'label' => 'Email',
        'placeholder' => 'Email del cliente'
    ],
    'Fax' => [
        'type' => 'text',
        'label' => 'Fax',
        'placeholder' => 'Fax del cliente'
    ],
    'FechaE' => [
        'type' => 'text',
        'label' => 'Fecha E',
        'placeholder' => 'Fecha E del cliente'
    ],
    'CodZona' => [
        'type' => 'text',
        'label' => 'Cod Zona',
        'placeholder' => 'Cod Zona del cliente'
    ],
    'CodVend' => [
        'type' => 'text',
        'label' => 'Cod Vend',
        'placeholder' => 'Cod Vend del cliente'
    ],
    'CodConv' => [
        'type' => 'text',
        'label' => 'Cod Conv',
        'placeholder' => 'Cod Conv del cliente'
    ],
    'CodAlte' => [
        'type' => 'text',
        'label' => 'Cod Alte',
        'placeholder' => 'Cod Alte del cliente'
    ],
    'TipoCli' => [
        'type' => 'text',
        'label' => 'Tipo Cli',
        'placeholder' => 'Tipo Cli del cliente'
    ],
    'TipoPVP' => [
        'type' => 'text',
        'label' => 'Tipo P V P',
        'placeholder' => 'Tipo P V P del cliente'
    ],
    'Observa' => [
        'type' => 'text',
        'label' => 'Observa',
        'placeholder' => 'Observa del cliente'
    ],
    'EsMoneda' => [
        'type' => 'text',
        'label' => 'Es Moneda',
        'placeholder' => 'Es Moneda del cliente'
    ],
    'EsCredito' => [
        'type' => 'text',
        'label' => 'Es Credito',
        'placeholder' => 'Es Credito del cliente'
    ],
    'LimiteCred' => [
        'type' => 'text',
        'label' => 'Limite Cred',
        'placeholder' => 'Limite Cred del cliente'
    ],
    'DiasCred' => [
        'type' => 'number',
        'label' => 'Dias Cred',
        'placeholder' => 'Dias Cred del cliente'
    ],
    'EsToleran' => [
        'type' => 'text',
        'label' => 'Es Toleran',
        'placeholder' => 'Es Toleran del cliente'
    ],
    'DiasTole' => [
        'type' => 'number',
        'label' => 'Dias Tole',
        'placeholder' => 'Dias Tole del cliente'
    ],
    'IntMora' => [
        'type' => 'text',
        'label' => 'Int Mora',
        'placeholder' => 'Int Mora del cliente'
    ],
    'Descto' => [
        'type' => 'text',
        'label' => 'Descto',
        'placeholder' => 'Descto del cliente'
    ],
    'Saldo' => [
        'type' => 'number',
        'label' => 'Saldo',
        'placeholder' => 'Saldo del cliente'
    ],
    'PagosA' => [
        'type' => 'number',
        'label' => 'Pagos A',
        'placeholder' => 'Pagos A del cliente'
    ],
    'FechaUV' => [
        'type' => 'text',
        'label' => 'Fecha U V',
        'placeholder' => 'Fecha U V del cliente'
    ],
    'MontoUV' => [
        'type' => 'text',
        'label' => 'Monto U V',
        'placeholder' => 'Monto U V del cliente'
    ],
    'NumeroUV' => [
        'type' => 'text',
        'label' => 'Numero U V',
        'placeholder' => 'Numero U V del cliente'
    ],
    'FechaUP' => [
        'type' => 'text',
        'label' => 'Fecha U P',
        'placeholder' => 'Fecha U P del cliente'
    ],
    'MontoUP' => [
        'type' => 'text',
        'label' => 'Monto U P',
        'placeholder' => 'Monto U P del cliente'
    ],
    'NumeroUP' => [
        'type' => 'text',
        'label' => 'Numero U P',
        'placeholder' => 'Numero U P del cliente'
    ],
    'MontoMax' => [
        'type' => 'text',
        'label' => 'Monto Max',
        'placeholder' => 'Monto Max del cliente'
    ],
    'MtoMaxCred' => [
        'type' => 'text',
        'label' => 'Mto Max Cred',
        'placeholder' => 'Mto Max Cred del cliente'
    ],
    'PromPago' => [
        'type' => 'text',
        'label' => 'Prom Pago',
        'placeholder' => 'Prom Pago del cliente'
    ],
    'RetenIVA' => [
        'type' => 'text',
        'label' => 'Reten I V A',
        'placeholder' => 'Reten I V A del cliente'
    ],
    'SaldoPtos' => [
        'type' => 'text',
        'label' => 'Saldo Ptos',
        'placeholder' => 'Saldo Ptos del cliente'
    ],
    'DescripExt' => [
        'type' => 'text',
        'label' => 'Descrip Ext',
        'placeholder' => 'Descrip Ext del cliente'
    ],
    'NIT' => [
        'type' => 'text',
        'label' => 'N I T',
        'placeholder' => 'N I T del cliente'
    ],
    'EsReten' => [
        'type' => 'text',
        'label' => 'Es Reten',
        'placeholder' => 'Es Reten del cliente'
    ]
];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        
    }

    
}