<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_CuponDocVenta".
 *
 * @property integer $fkNTC_DocumentoVenta
 * @property integer $fkNTC_CuponDescuento
 * @property integer $Aplicado
 *
 * @property NTCDocumentoVenta $fkNTCDocumentoVenta
 * @property NTCCuponDescuento $fkNTCCuponDescuento
 */
class CuponDocVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_CuponDocVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_DocumentoVenta', 'fkNTC_CuponDescuento'], 'required'],
            [['fkNTC_DocumentoVenta', 'fkNTC_CuponDescuento', 'Aplicado'], 'integer'],
            [['fkNTC_DocumentoVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDocumentoVenta::className(), 'targetAttribute' => ['fkNTC_DocumentoVenta' => 'idNTC_DocumentoVenta']],
            [['fkNTC_CuponDescuento'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCuponDescuento::className(), 'targetAttribute' => ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fkNTC_DocumentoVenta' => 'Fk Ntc  Documento Venta',
            'fkNTC_CuponDescuento' => 'Fk Ntc  Cupon Descuento',
            'Aplicado' => 'Aplicado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoVenta()
    {
        return $this->hasOne(DocumentoVenta::className(), ['idNTC_DocumentoVenta' => 'fkNTC_DocumentoVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuponDescuento()
    {
        return $this->hasOne(CuponDescuento::className(), ['idNTC_CuponDescuento' => 'fkNTC_CuponDescuento']);
    }
}
