<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Configuracion".
 *
 * @property integer $idNTC_Configuracion
 * @property integer $fkNTC_Empresa
 * @property integer $fkNTC_TipoAltaUsuarios
 * @property integer $AvisoAltas
 * @property integer $MaxIntentosLogin
 * @property integer $EdadMinimaUsuarios
 * @property integer $EdadMaximaUsuarios
 * @property integer $PeriodoPrevioValidezCtas
 * @property integer $PeriodoValidezCtas
 * @property integer $fkNTC_PaisPorDefecto
 * @property integer $fkNTC_TiendaPorDefecto
 * @property integer $fkNTC_FormaPago
 * @property integer $fkNTC_MetodoEnvio
 * @property integer $fkNTC_GrupoPrecioCliente
 * @property integer $fkNTC_GrupoDescuentoCliente
 * @property integer $VerArticulosSinPrecio
 * @property integer $VerArticulosSinStock
 * @property integer $VerVariantesSinStock
 * @property integer $MinutosCaducidadCarritos
 * @property string $EmailContacto
 * @property integer $fkNTC_Divisa
 * @property integer $Translate
 * @property integer $Maintenance
 * @property string $MaintenanceIPs
 * @property string $PrefijoTablas
 * @property string $RutaDocumentos
 * @property integer $NumeroPostPagina
 *
 * @property NTCEmpresa $fkNTCEmpresa
 * @property NTCGrupoDescuentoCliente $fkNTCGrupoDescuentoCliente
 * @property NTCPais $fkNTCPaisPorDefecto
 * @property NTCTienda $fkNTCTiendaPorDefecto
 * @property NTCTipoAltaUsuarios $fkNTCTipoAltaUsuarios
 * @property NTCDivisa $fkNTCDivisa
 * @property NTCFormaPago $fkNTCFormaPago
 * @property NTCMetodoEnvio $fkNTCMetodoEnvio
 * @property NTCGrupoPrecioCliente $fkNTCGrupoPrecioCliente
 */
class Configuracion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Configuracion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Configuracion', 'fkNTC_Empresa', 'fkNTC_TipoAltaUsuarios', 'MaxIntentosLogin', 'EdadMinimaUsuarios', 'EdadMaximaUsuarios', 'fkNTC_PaisPorDefecto', 'fkNTC_TiendaPorDefecto', 'fkNTC_FormaPago', 'fkNTC_MetodoEnvio', 'fkNTC_GrupoPrecioCliente', 'fkNTC_GrupoDescuentoCliente', 'MinutosCaducidadCarritos', 'EmailContacto', 'fkNTC_Divisa', 'PrefijoTablas'], 'required'],
            [['idNTC_Configuracion', 'fkNTC_Empresa', 'fkNTC_TipoAltaUsuarios', 'AvisoAltas', 'MaxIntentosLogin', 'EdadMinimaUsuarios', 'EdadMaximaUsuarios', 'PeriodoPrevioValidezCtas', 'PeriodoValidezCtas', 'fkNTC_PaisPorDefecto', 'fkNTC_TiendaPorDefecto', 'fkNTC_FormaPago', 'fkNTC_MetodoEnvio', 'fkNTC_GrupoPrecioCliente', 'fkNTC_GrupoDescuentoCliente', 'VerArticulosSinPrecio', 'VerArticulosSinStock', 'VerVariantesSinStock', 'MinutosCaducidadCarritos', 'fkNTC_Divisa', 'Translate', 'Maintenance', 'NumeroPostPagina'], 'integer'],
            [['EmailContacto', 'MaintenanceIPs', 'RutaDocumentos'], 'string', 'max' => 255],
            [['PrefijoTablas'], 'string', 'max' => 5],
            [['fkNTC_Empresa'], 'unique'],
            [['fkNTC_Empresa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCEmpresa::className(), 'targetAttribute' => ['fkNTC_Empresa' => 'idNTC_Empresa']],
            [['fkNTC_GrupoDescuentoCliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCGrupoDescuentoCliente::className(), 'targetAttribute' => ['fkNTC_GrupoDescuentoCliente' => 'idNTC_GrupoDescuentoCliente']],
            [['fkNTC_PaisPorDefecto'], 'exist', 'skipOnError' => true, 'targetClass' => NTCPais::className(), 'targetAttribute' => ['fkNTC_PaisPorDefecto' => 'idNTC_Pais']],
            [['fkNTC_TiendaPorDefecto'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTienda::className(), 'targetAttribute' => ['fkNTC_TiendaPorDefecto' => 'idNTC_Tienda']],
            [['fkNTC_TipoAltaUsuarios'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoAltaUsuarios::className(), 'targetAttribute' => ['fkNTC_TipoAltaUsuarios' => 'idNTC_TipoAltaUsuarios']],
            [['fkNTC_Divisa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDivisa::className(), 'targetAttribute' => ['fkNTC_Divisa' => 'idNTC_Divisa']],
            [['fkNTC_FormaPago'], 'exist', 'skipOnError' => true, 'targetClass' => NTCFormaPago::className(), 'targetAttribute' => ['fkNTC_FormaPago' => 'idNTC_FormaPago']],
            [['fkNTC_MetodoEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCMetodoEnvio::className(), 'targetAttribute' => ['fkNTC_MetodoEnvio' => 'idNTC_MetodoEnvio']],
            [['fkNTC_GrupoPrecioCliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCGrupoPrecioCliente::className(), 'targetAttribute' => ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Configuracion' => 'Id Ntc  Configuracion',
            'fkNTC_Empresa' => 'Fk Ntc  Empresa',
            'fkNTC_TipoAltaUsuarios' => 'Fk Ntc  Tipo Alta Usuarios',
            'AvisoAltas' => 'Aviso Altas',
            'MaxIntentosLogin' => 'Max Intentos Login',
            'EdadMinimaUsuarios' => 'Edad Minima Usuarios',
            'EdadMaximaUsuarios' => 'Edad Maxima Usuarios',
            'PeriodoPrevioValidezCtas' => 'Periodo Previo Validez Ctas',
            'PeriodoValidezCtas' => 'Periodo Validez Ctas',
            'fkNTC_PaisPorDefecto' => 'Fk Ntc  Pais Por Defecto',
            'fkNTC_TiendaPorDefecto' => 'Fk Ntc  Tienda Por Defecto',
            'fkNTC_FormaPago' => 'Fk Ntc  Forma Pago',
            'fkNTC_MetodoEnvio' => 'Fk Ntc  Metodo Envio',
            'fkNTC_GrupoPrecioCliente' => 'Fk Ntc  Grupo Precio Cliente',
            'fkNTC_GrupoDescuentoCliente' => 'Fk Ntc  Grupo Descuento Cliente',
            'VerArticulosSinPrecio' => 'Ver Articulos Sin Precio',
            'VerArticulosSinStock' => 'Ver Articulos Sin Stock',
            'VerVariantesSinStock' => 'Ver Variantes Sin Stock',
            'MinutosCaducidadCarritos' => 'Minutos Caducidad Carritos',
            'EmailContacto' => 'Email Contacto',
            'fkNTC_Divisa' => 'Fk Ntc  Divisa',
            'Translate' => 'Translate',
            'Maintenance' => 'Maintenance',
            'MaintenanceIPs' => 'Maintenance Ips',
            'PrefijoTablas' => 'Prefijo Tablas',
            'RutaDocumentos' => 'Ruta Documentos',
            'NumeroPostPagina' => 'Numero Post Pagina',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCEmpresa()
    {
        return $this->hasOne(NTCEmpresa::className(), ['idNTC_Empresa' => 'fkNTC_Empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCGrupoDescuentoCliente()
    {
        return $this->hasOne(NTCGrupoDescuentoCliente::className(), ['idNTC_GrupoDescuentoCliente' => 'fkNTC_GrupoDescuentoCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCPaisPorDefecto()
    {
        return $this->hasOne(NTCPais::className(), ['idNTC_Pais' => 'fkNTC_PaisPorDefecto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTiendaPorDefecto()
    {
        return $this->hasOne(NTCTienda::className(), ['idNTC_Tienda' => 'fkNTC_TiendaPorDefecto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTipoAltaUsuarios()
    {
        return $this->hasOne(NTCTipoAltaUsuarios::className(), ['idNTC_TipoAltaUsuarios' => 'fkNTC_TipoAltaUsuarios']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCDivisa()
    {
        return $this->hasOne(NTCDivisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCFormaPago()
    {
        return $this->hasOne(NTCFormaPago::className(), ['idNTC_FormaPago' => 'fkNTC_FormaPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCMetodoEnvio()
    {
        return $this->hasOne(NTCMetodoEnvio::className(), ['idNTC_MetodoEnvio' => 'fkNTC_MetodoEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCGrupoPrecioCliente()
    {
        return $this->hasOne(NTCGrupoPrecioCliente::className(), ['idNTC_GrupoPrecioCliente' => 'fkNTC_GrupoPrecioCliente']);
    }
}
