import { TestBed, inject } from '@angular/core/testing';

import { RealPropertyService } from './real-property.service';

describe('RealPropertyService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [RealPropertyService]
    });
  });

  it('should be created', inject([RealPropertyService], (service: RealPropertyService) => {
    expect(service).toBeTruthy();
  }));
});
