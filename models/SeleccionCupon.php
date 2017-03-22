<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_SeleccionCupon".
 *
 * @property integer $idNTC_SeleccionCupon
 * @property integer $fkNTC_CuponDescuento
 * @property integer $fkNTC_TipoSeleccionCupon
 * @property string $Seleccion
 *
 * @property NTCCuponDescuento $fkNTCCuponDescuento
 * @property NTCTipoSeleccionCupon $fkNTCTipoSeleccionCupon
 */
class SeleccionCupon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_SeleccionCupon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_CuponDescuento', 'fkNTC_TipoSeleccionCupon', 'Seleccion'], 'required'],
            [['fkNTC_CuponDescuento', 'fkNTC_TipoSeleccionCupon'], 'integer'],
            [['Seleccion'], 'string', 'max' => 255],
            [['fkNTC_CuponDescuento'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCuponDescuento::className(), 'targetAttribute' => ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']],
            [['fkNTC_TipoSeleccionCupon'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoSeleccionCupon::className(), 'targetAttribute' => ['fkNTC_TipoSeleccionCupon' => 'idNTC_TipoSeleccionCupon']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_SeleccionCupon' => 'Id Ntc  Seleccion Cupon',
            'fkNTC_CuponDescuento' => 'Fk Ntc  Cupon Descuento',
            'fkNTC_TipoSeleccionCupon' => 'Fk Ntc  Tipo Seleccion Cupon',
            'Seleccion' => 'Seleccion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCCuponDescuento()
    {
        return $this->hasOne(NTCCuponDescuento::className(), ['idNTC_CuponDescuento' => 'fkNTC_CuponDescuento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTipoSeleccionCupon()
    {
        return $this->hasOne(NTCTipoSeleccionCupon::className(), ['idNTC_TipoSeleccionCupon' => 'fkNTC_TipoSeleccionCupon']);
    }
}
