<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    /**
     * Tampilkan form register atau proses POST registrasi
     */
    public function register()
    {
        if ($this->request->is('post')) {
            $rules = [
                'name'             => 'required|min_length[3]|max_length[100]',
                'email'            => 'required|valid_email|is_unique[users.email]',
                'password'         => 'required|min_length[8]',
                'password_confirm' => 'required|matches[password]',
            ];

            $messages = [
                'name' => [
                    'required'   => 'Nama wajib diisi.',
                    'min_length' => 'Nama minimal 3 karakter.',
                    'max_length' => 'Nama maksimal 100 karakter.',
                ],
                'email' => [
                    'required'    => 'Email wajib diisi.',
                    'valid_email' => 'Format email tidak valid.',
                    'is_unique'   => 'Email sudah terdaftar.',
                ],
                'password' => [
                    'required'   => 'Password wajib diisi.',
                    'min_length' => 'Password minimal 8 karakter.',
                ],
                'password_confirm' => [
                    'required' => 'Konfirmasi password wajib diisi.',
                    'matches'  => 'Konfirmasi password tidak cocok dengan password.',
                ],
            ];

            if (! $this->validate($rules, $messages)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $name     = $this->request->getPost('name');
            $email    = $this->request->getPost('email');
            $password = (string) $this->request->getPost('password');

            $userData = [
                'name'     => $name,
                'email'    => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
            ];

            if ($this->userModel->save($userData)) {
                return redirect()->to(site_url('login'))->with('success', 'Registrasi berhasil! Silakan login.');
            }

            return redirect()->back()->withInput()->with('error', 'Gagal melakukan registrasi, silakan coba lagi.');
        }

        return view('auth/register');
    }

    /**
     * Tampilkan form login atau proses POST login
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $rules = [
                'email'    => 'required|valid_email',
                'password' => 'required',
            ];

            $messages = [
                'email' => [
                    'required'    => 'Email wajib diisi.',
                    'valid_email' => 'Format email tidak valid.',
                ],
                'password' => [
                    'required' => 'Password wajib diisi.',
                ],
            ];

            if (! $this->validate($rules, $messages)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $email    = $this->request->getPost('email');
            $password = (string) $this->request->getPost('password');

            $user = $this->userModel->findByEmail($email);

            if (! $user || ! password_verify($password, $user['password'])) {
                return redirect()->back()->withInput()->with('error', 'Email atau password salah.');
            }

            // Simpan session
            $sessionData = [
                'user_id'      => $user['id'],
                'user_name'    => $user['name'],
                'is_logged_in' => true,
            ];
            session()->set($sessionData);

            return redirect()->to(site_url('products'))->with('success', 'Selamat datang kembali, ' . $user['name'] . '!');
        }

        return view('auth/login');
    }

    /**
     * Logout dan destroy session
     */
    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'))->with('success', 'Anda telah berhasil logout.');
    }
}
