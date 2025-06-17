<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 p-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ __('Task Status Overview') }}</h3>
                        <canvas id="myChart"></canvas>
                    </div>
                    <table>
                        <tr>
                            <td>
                                <h3 class="text-lg font-semibold text-center">{{ __('Total Tasks') }}</h3>
                                <p class="text-2xl font-bold text-center">{{ $taskCount }}</p>
                            </td>
                            <td>
                                <h3 class="text-lg font-semibold text-center">{{ __('Completed Tasks') }}</h3>
                                <p class="text-2xl font-bold text-center">{{ $taskCountByStatus['completed'] ?? 0 }}</p>
                            </td>
                            <td>
                                <h3 class="text-lg font-semibold text-center">{{ __('Total Overdue Tasks') }}</h3>
                                <p class="text-2xl font-bold text-center">{{ $taskCountByStatus['overdue'] ?? 0 }}</p>
                            </td>
                            <td>
                                <h3 class="text-lg font-semibold text-center">{{ __('Total Pending Tasks') }}</h3>
                                <p class="text-2xl font-bold text-center">{{ $taskCountByStatus['pending'] ?? 0 }}</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
    ctx.height = 400;
    ctx.width = 400;
    ctx.style.width = '100%';
    ctx.style.height = '400px';
    ctx.style.maxWidth = '400px';
    ctx.style.maxHeight = '400px';
    ctx.style.margin = '0 auto';

  new Chart(ctx, {

    type: 'pie',
    data: {
      labels: ['Complete', 'Pending', 'Overdue'],
      datasets: [{
        label: 'Tasks',
        data: [
          {{ $taskCountByStatus['completed'] ?? 0 }},
          {{ $taskCountByStatus['pending'] ?? 0 }},
          {{ $taskCountByStatus['overdue'] ?? 0 }}
        ],
         hoverOffset: 4
      }]
    },

  });
</script>
