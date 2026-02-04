<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.operational_hours', [ [ 'day' => 'Senin - Jumat', 'to_hour' => '20:00', 'timezone' => 'WIB', 'from_hour' => '07:00' ] ]);
        $this->migrator->add('general.footer_description', 'Quantum adalah merek terkemuka dalam menyediakan produk dapur berkualitas, seperti kompor gas, regulator, dan selang gas. Kami berkomitmen untuk menghadirkan inovasi yang mempermudah aktivitas memasak Anda, dengan desain yang modern dan efisien.');
    }
};
