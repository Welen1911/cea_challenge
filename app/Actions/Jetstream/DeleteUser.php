<?php

namespace App\Actions\Jetstream;

use App\Models\Filme;
use App\Models\User;
use App\Models\Venda;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     */
    public function delete(User $user): void
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();

        $vendas = Venda::where('user_id', '=', $user->id)->get();

        foreach($vendas as $venda) {
            $filme = Filme::findOrFail($venda->filme_id);
            $filme->amount += $venda->amount;
            $filme->update();
            $venda->delete();
        }
        $user->delete();
    }
}
