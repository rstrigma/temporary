<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
	public function validationDefault(Validator $validator)
    {
        return $validator
			->allowEmpty('confirm')
			->add('confirm',
			'compareWith', [
				'rule' => ['compareWith', 'password'],
				'message' => 'Passwords not equal.'
			]
			);
    }
}
