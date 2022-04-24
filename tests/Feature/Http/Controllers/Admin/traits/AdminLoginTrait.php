<?php

namespace Tests\Feature\Http\Controllers\Admin\traits;

use App\Models\Admin;

trait AdminLoginTrait
{
    public function setUp(): void
    {
        parent::setUp();

        $admin = Admin::factory()->create()->first();        
        $this->actingAs($admin, 'admin')->withSession(['admin'=>'logged_in']);
    }
}