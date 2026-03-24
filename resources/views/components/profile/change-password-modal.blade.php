@props([
    'userId' => null,
])

<div 
    id="changePasswordModal" 
    class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4"
>
    <div class="bg-white rounded-lg shadow-2xl max-w-md w-full">
        <!-- Header -->
        <div class="bg-slate-800 px-6 py-4 flex items-center justify-between">
            <h3 class="text-lg font-bold text-white">Alterar Senha</h3>
            <button 
                type="button"
                onclick="document.getElementById('changePasswordModal').classList.add('hidden')"
                class="text-white p-1 rounded transition"
            >
                ✕
            </button>
        </div>

        <!-- Form -->
        <form action="" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT')

            @if($userId)
                <input type="hidden" name="user_id" value="{{ $userId }}">
            @endif

            <!-- Current Password -->
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">
                    Senha Atual
                </label>
                <input 
                    type="password" 
                    id="current_password" 
                    name="current_password" 
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-zinc-400 focus:border-transparent transition"
                    placeholder="Digite sua senha atual"
                >
                @error('current_password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- New Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Nova Senha
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-zinc-400 focus:border-transparent transition"
                    placeholder="Digite uma nova senha"
                >
                <p class="text-xs text-gray-500 mt-1">Mínimo 8 caracteres</p>
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    Confirmar Senha
                </label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-zinc-400 focus:border-transparent transition"
                    placeholder="Confirme a nova senha"
                >
                @error('password_confirmation')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex space-x-3 pt-4 border-t border-gray-200">
                <button 
                    type="button"
                    onclick="document.getElementById('changePasswordModal').classList.add('hidden')"
                    class="flex-1 px-4 py-2 text-white bg-black rounded-lg active:scale-95 font-medium transition"
                >
                    Cancelar
                </button>
                <button 
                    type="submit"
                    class="flex-1 px-4 py-2 active:scale-95 text-black border-2 rounded-lg  font-medium"
                >
                    Alterar
                </button>
            </div>
        </form>
    </div>
</div>
