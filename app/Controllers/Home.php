<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Home extends BaseController
{
    public function index()
    {
        echo view('common/header');
        echo view('login');
        echo view('common/footer');
    }
    public function login()
    {
        $username = $this->request->getPost('NAME');
        $password = $this->request->getPost('PASSWORD');

        $model = new UsuarioModel();

        $user = $model->getUser($username, $password);

        if ($user) {
            // Define a variável de sessão 'isLoggedIn' como true
            session()->set('isLoggedIn', true);
            session()->set('userId', $user['ID']); // Armazena o ID do usuário na sessão
            // Limpa todas as outras variáveis de sessão
            session()->remove(['otherSessionVariable1', 'otherSessionVariable2']);
            // Redireciona para a tela "index"
            return redirect()->to('home/sistema');
        } else {
            // Caso o login falhe, redireciona de volta para a tela de login
            return redirect()->back()->with('error', 'Credenciais inválidas.')->withInput();
        }
}

    public function sistema()
    {
        // Verifica se o usuário está autenticado
        if (!session()->get('isLoggedIn')) {
            // Caso não esteja autenticado, redireciona para a tela de login
            return redirect()->to('home/login');
        }
        echo view('common/header');
        echo view('index');
        echo view('common/footer');
    }

    public function updateUsername() {
        $newUsername = $this->request->getPost('newUsername');
        $userId = session()->get('userId'); // Recupera o ID do usuário da sessão
    
        $model = new UsuarioModel();
        $existingUser = $model->where('USERNAME', $newUsername)->first();
        if ($existingUser) {
            return redirect()->back()->with('error', 'Este nome de usuário já está em uso.');
        }
    
        if ($model->updateUsername($userId, $newUsername)) {
            return redirect()->back()->with('message', 'Nome de usuário atualizado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Houve um erro ao atualizar o nome de usuário.');
        }
    }
    
    public function updatePassword() {
        $newPassword = $this->request->getPost('newPassword');
        $userId = session()->get('userId'); // Recupera o ID do usuário da sessão
    
        // Diretamente atualiza a senha sem usar o password_hash
        $model = new UsuarioModel();
        if ($model->updatePassword($userId, $newPassword)) {
            return redirect()->back()->with('message', 'Senha atualizada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Houve um erro ao atualizar a senha.');
        }
    }
    
}
