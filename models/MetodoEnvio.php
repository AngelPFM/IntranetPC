<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_MetodoEnvio".
 *
 * @property integer $idNTC_MetodoEnvio
 * @property integer $fkNTC_ProveedorEnvio
 * @property string $Nombre
 * @property string $Descripcion
 * @property integer $fkNTC_TipoValoracion
 * @property integer $fkNTC_TipoCalculo
 * @property integer $PesoMaxPaquete
 * @property integer $PesoMinPaquete
 * @property integer $fkNTC_TipoTarifa
 * @property integer $fkNTC_UnidadMedida
 * @property integer $TipoCosteManipulacion
 * @property double $CosteManipulacion
 * @property integer $TiempoPreparacion
 * @property double $ImporteMinEnvioGratuito
 * @property integer $Quitar
 *
 * @property NTCCabAlbaranVenta[] $nTCCabAlbaranVentas
 * @property NTCConfiguracion[] $nTCConfiguracions
 * @property NTCCuponDescuento[] $nTCCuponDescuentos
 * @property NTCProveedorEnvio $fkNTCProveedorEnvio
 * @property NTCUnidadMedida $fkNTCUnidadMedida
 * @property NTCTipoValoracion $fkNTCTipoValoracion
 * @property NTCTipoCalculo $fkNTCTipoCalculo
 * @property NTCTipoTarifa $fkNTCTipoTarifa
 */
class MetodoEnvio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_MetodoEnvio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_ProveedorEnvio', 'Nombre', 'Descripcion', 'fkNTC_TipoValoracion', 'fkNTC_TipoCalculo', 'fkNTC_TipoTarifa', 'fkNTC_UnidadMedida'], 'required'],
            [['fkNTC_ProveedorEnvio', 'fkNTC_TipoValoracion', 'fkNTC_TipoCalculo', 'PesoMaxPaquete', 'PesoMinPaquete', 'fkNTC_TipoTarifa', 'fkNTC_UnidadMedida', 'TipoCosteManipulacion', 'TiempoPreparacion', 'Quitar'], 'integer'],
            [['Descripcion'], 'string'],
            [['CosteManipulacion', 'ImporteMinEnvioGratuito'], 'number'],
            [['Nombre'], 'string', 'max' => 80],
            [['fkNTC_ProveedorEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCProveedorEnvio::className(), 'targetAttribute' => ['fkNTC_ProveedorEnvio' => 'idNTC_ProveedorEnvio']],
            [['fkNTC_UnidadMedida'], 'exist', 'skipOnError' => true, 'targetClass' => NTCUnidadMedida::className(), 'targetAttribute' => ['fkNTC_UnidadMedida' => 'idNTC_UnidadMedida']],
            [['fkNTC_TipoValoracion'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoValoracion::className(), 'targetAttribute' => ['fkNTC_TipoValoracion' => 'idNTC_TipoValoracion']],
            [['fkNTC_TipoCalculo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoCalculo::className(), 'targetAttribute' => ['fkNTC_TipoCalculo' => 'idNTC_TipoCalculo']],
            [['fkNTC_TipoTarifa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoTarifa::className(), 'targetAttribute' => ['fkNTC_TipoTarifa' => 'idNTC_TipoTarifa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_MetodoEnvio' => 'Id Ntc  Metodo Envio',
            'fkNTC_ProveedorEnvio' => 'Fk Ntc  Proveedor Envio',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'fkNTC_TipoValoracion' => 'Fk Ntc  Tipo Valoracion',
            'fkNTC_TipoCalculo' => 'Fk Ntc  Tipo Calculo',
            'PesoMaxPaquete' => 'Peso Max Paquete',
            'PesoMinPaquete' => 'Peso Min Paquete',
            'fkNTC_TipoTarifa' => 'Fk Ntc  Tipo Tarifa',
            'fkNTC_UnidadMedida' => 'Fk Ntc  Unidad Medida',
            'TipoCosteManipulacion' => 'Tipo Coste Manipulacion',
            'CosteManipulacion' => 'Coste Manipulacion',
            'TiempoPreparacion' => 'Tiempo Preparacion',
            'ImporteMinEnvioGratuito' => 'Importe Min Envio Gratuito',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAlbaranVentas()
    {
        return $this->hasMany(CabAlbaranVenta::className(), ['fkNTC_MetodoEnvio' => 'idNTC_MetodoEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguracions()
    {
        return $this->hasMany(Configuracion::className(), ['fkNTC_MetodoEnvio' => 'idNTC_MetodoEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuponDescuentos()
    {
        return $this->hasMany(CuponDescuento::className(), ['fkNTC_MetodoEnvio' => 'idNTC_MetodoEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProveedorEnvio()
    {
        return $this->hasOne(ProveedorEnvio::className(), ['idNTC_ProveedorEnvio' => 'fkNTC_ProveedorEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnidadMedida()
    {
        return $this->hasOne(UnidadMedida::className(), ['idNTC_UnidadMedida' => 'fkNTC_UnidadMedida']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoValoracion()
    {
        return $this->hasOne(TipoValoracion::className(), ['idNTC_TipoValoracion' => 'fkNTC_TipoValoracion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCalculo()
    {
        return $this->hasOne(TipoCalculo::className(), ['idNTC_TipoCalculo' => 'fkNTC_TipoCalculo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoTarifa()
    {
        return $this->hasOne(TipoTarifa::className(), ['idNTC_TipoTarifa' => 'fkNTC_TipoTarifa']);
    }
}
