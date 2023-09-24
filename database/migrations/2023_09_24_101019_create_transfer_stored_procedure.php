<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE PROCEDURE `transfer`(
                IN `user_id` INT,
                IN `merchant_id` INT,
                IN `amount` DECIMAL(10,3),
                IN `deduction_entered` DECIMAL(10,3),
                IN `deduction_fixed` DECIMAL(10,3)
            )
            BEGIN
                DECLARE `wallet_balance_before` DECIMAL(10,3);
                DECLARE `wallet_balance_after` DECIMAL(10,3);
                DECLARE `merchant_balance_before` DECIMAL(10,3);
                DECLARE `merchant_balance_after` DECIMAL(10,3);
                DECLARE `code` VARCHAR(255);
    
                IF `deduction_entered` IS NULL OR `deduction_entered` = \'\' THEN
                    SET `deduction_entered` = `deduction_fixed`;
                END IF;
    
                SET `deduction_entered` = `deduction_entered` / 100;
                SET `wallet_balance_before` = (SELECT `balance` FROM `users` WHERE `id` = `user_id`);
                SET `wallet_balance_after` = `wallet_balance_before` - (`amount` - `deduction_entered`);
                SET `merchant_balance_before` = (SELECT `balance` FROM `merchants` WHERE `id` = `merchant_id`);
                SET `merchant_balance_after` = `merchant_balance_before` + (`amount` - `deduction_entered`);
                SET `code` = UUID();
    
                START TRANSACTION;
    
                INSERT INTO `transfers` (
                    `user_id`,
                    `merchant_id`,
                    `amount`,
                    `deduction_entered`,
                    `deduction_fixed`,
                    `wallet_balance_before`,
                    `wallet_balance_after`,
                    `merchant_balance_before`,
                    `merchant_balance_after`,
                    `code`,
                    `created_at`,
                    `updated_at`
                )
                VALUES (
                    `user_id`,
                    `merchant_id`,
                    `amount`,
                    `deduction_entered`,
                    `deduction_fixed`,
                    `wallet_balance_before`,
                    `wallet_balance_after`,
                    `merchant_balance_before`,
                    `merchant_balance_after`,
                    `code`,
                    NOW(),
                    NOW()
                );
    
                UPDATE `users` SET `balance` = `wallet_balance_after` - `deduction_entered` WHERE `id` = `user_id`;
                UPDATE `merchants` SET `balance` = `merchant_balance_after` WHERE `id` = `merchant_id`;
    
                COMMIT;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::unprepared('DROP PROCEDURE IF EXISTS `transfer`');
    }
};
