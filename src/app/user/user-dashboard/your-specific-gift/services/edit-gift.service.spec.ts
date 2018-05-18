import { TestBed, inject } from '@angular/core/testing';

import { EditGiftService } from './edit-gift.service';

describe('EditGiftService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [EditGiftService]
    });
  });

  it('should be created', inject([EditGiftService], (service: EditGiftService) => {
    expect(service).toBeTruthy();
  }));
});
