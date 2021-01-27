<?php

namespace app\models;

/**
 * This is the model class for table "number".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $number
 * @property string $numbers
 * @property int $number_index
 *
 * @property User $user
 */
class Number extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'number';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'numbers', 'number_index'], 'required'],
            [['user_id', 'number', 'number_index'], 'integer'],
            [['numbers'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'number' => 'Число',
            'numbers' => 'Числа',
            'number_index' => 'Индекс числа',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
