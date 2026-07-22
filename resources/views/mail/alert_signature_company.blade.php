@php
    use Carbon\Carbon;
    use App\Models\Account;
@endphp
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fim de assinaturas</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f8fafc;
            color: #e5e7eb;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        .page {
            width: 100%;
            min-height: 100vh;
            padding: 32px 16px;
            box-sizing: border-box;
        }
        .card {
            max-width: 680px;
            margin: 0 auto;
            background: #111827;
            border-radius: 24px;
            padding: 32px;
            box-shadow: 0 24px 80px rgba(15, 23, 42, 0.18);
        }
        .badge {
            display: inline-flex;
            padding: 8px 14px;
            border-radius: 999px;
            background: #f8fafc;
            color: #111827;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            margin-bottom: 20px;
        }
        .title {
            margin: 0 0 16px;
            font-size: 32px;
            line-height: 1.05;
            color: #ffffff;
        }
        .subtitle {
            margin: 0;
            color: #cbd5e1;
            font-size: 16px;
            line-height: 1.75;
            max-width: 560px;
        }
        .notice {
            margin-top: 28px;
            padding: 24px;
            background: #1f2937;
            border-radius: 18px;
            color: #e2e8f0;
            line-height: 1.75;
        }
        .notice strong {
            color: #ffffff;
        }
        .list {
            margin: 18px 0 0;
            padding: 0;
            list-style: none;
        }
        .list-item {
            margin-bottom: 18px;
            padding-bottom: 18px;
            border-bottom: 1px solid rgba(148, 163, 184, 0.16);
        }
        .list-item:last-child {
            margin-bottom: 0;
            border-bottom: none;
            padding-bottom: 0;
        }
        .item-title {
            margin: 0 0 6px;
            font-size: 17px;
            color: #ffffff;
            font-weight: 700;
        }
        .item-meta {
            margin: 0;
            color: #94a3b8;
            font-size: 15px;
        }
        .footer {
            margin-top: 32px;
            color: #9ca3af;
            font-size: 14px;
            line-height: 1.75;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="card">
            <span class="badge">Aviso</span>
            <h1 class="title">Potenciais dívidas de assinatura</h1>
            <p class="subtitle">Como colaborador responsável, você recebe este e-mail para acompanhar assinaturas próximas do vencimento e evitar possíveis valores em aberto.</p>

            <div class="notice">
                @php $hasExpiring = false; @endphp
                @foreach ($signatures as $signature)
                    @if (Carbon::today()->diffInDays($signature->end_date) <= 5)
                        @php $hasExpiring = true; @endphp
                    @endif
                @endforeach

                @if ($hasExpiring)
                    <p><strong>Resumo rápido:</strong> as seguintes assinaturas expiram em até 5 dias e podem gerar cobranças se não forem renovadas.</p>
                    <ul class="list">
                        @foreach ($signatures as $signature)
                            @if (Carbon::today()->diffInDays($signature->end_date) <= 5)
                                <li class="list-item">
                                    <p class="item-title">{{ Account::find($signature->account_id)?->name ?? 'Conta desconhecida' }}</p>
                                    <p class="item-meta">Faltam {{ Carbon::today()->diffInDays($signature->end_date,true) }} dias para expirar e potencialmente gerar uma dívida.</p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <p style="margin: 0;">Nenhuma assinatura expira nos próximos 5 dias. O fluxo de pagamentos está em dia no momento.</p>
                @endif
            </div>

            <p class="footer" style="margin-top: 12px; font-size: 12px; color: #6b7280;">© {{ now()->year }} qostel. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>