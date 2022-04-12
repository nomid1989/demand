<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

/**
 * Class WelcomeController.
 *
 * @package App\Http\Controllers
 * @author DaKoshin.
 */
class WelcomeController extends Controller
{
    /**
     * Redirect to api documentation.
     *
     * @return RedirectResponse
     */
    public function __invoke()
    {
        return redirect()->to('/api/documentation');
    }
}
